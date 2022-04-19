<?php

use App\Models\Meetings;
use App\Models\QuizQuesetion;
use App\Models\QuizOption;
use App\Models\ProtocolQuestion;
use App\Models\ProtocolQuestionOption;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

//use App\Models\
function add_quiz_qustions($data){
    $quiz_details = explode(",",$data['ids']);
    $iterations = count($quiz_details);
    $count = 1;
    foreach ($quiz_details as $value) {
        if (!isset($data['question_'.$value]) && $iterations == $count) {
            break;
        }
        $question = array(
            'question' =>   $data["question_" . $value],
            'hint'     =>   $data["hint_" . $value],
            'type'     =>   $data["question_type_" . $value],
            'quiz_id'  =>   $data['quiz_id']
        );
        $question_id = QuizQuesetion::insertGetId($question);
        if($data["question_type_".$value]==1){
            $options=array(
                1 => 'Yes',
                2   => 'No'
            );
            for($i=1; $i<3;$i++){
                $is_correct = $data['answer_'.$value]==$i ? 1 : 2;
                $qdata = array(
                    'question_id'   =>  $question_id,
                    'option'        =>  $options[$i],
                    'is_correct'    =>  $is_correct
                );
                QuizOption::insert($qdata);
            }
        }
        elseif($data["question_type_".$value]==2){
            $correct_answers = explode(",",$data['answer_'.$value]);
            for($i=1; $i<5;$i++){
                $is_correct= in_array($i,$correct_answers)==true? 1 : 2;
                $qdata = array(
                    'question_id'   =>  $question_id,
                    'option'        =>  $data['option_'.$i.''.$value],
                    'is_correct'    =>  $is_correct
                );
                QuizOption::insert($qdata);
            }
        }
        elseif($data["question_type_".$value]==3){
            for($i=1; $i<5;$i++){
                $is_correct = $data['answer_'.$value]==$i ? 1 : 2;
                $qdata = array(
                    'question_id'   =>  $question_id,
                    'option'        =>  $data['option_'.$i.''.$value],
                    'is_correct'    =>  $is_correct
                );
                QuizOption::insert($qdata);
            }
        }
        elseif($data["question_type_".$value]==4){
            for($i=1; $i<5;$i++){
                $image_name = rand(1111111111,9999999999).'.'.$data['option_'.$i.''.$value]->extension();
                $data['option_'.$i.''.$value]->move(public_path('uploads/courses'), $image_name);
                $is_correct = $data['answer_'.$value]==$i ? 1 : 2;
                $qdata = array(
                    'question_id'   =>  $question_id,
                    'option'        =>  $image_name,
                    'is_correct'    =>  $is_correct
                );
                QuizOption::insert($qdata);
            }
        }
    }
}
function add_protocol_qustions($data){
    $quiz_details = explode(",",$data['ids']);
    $iterations = count($quiz_details);
    $count = 1;
    foreach ($quiz_details as $value) {
         if (!isset($data['question_'.$value]) && $iterations == $count) {
            break;
        }


        $question = array(
            'question' =>   $data["question_" . $value],
            'hint'     =>   $data["hint_" . $value],
            'type'     =>   $data["question_type_" . $value],
            'chapter_id'  =>   $data['chapter_id'],
            'explanation'  =>   $data['explanation_'.$value],
            'yes_option_text'  =>   $data['yes_option_text_'.$value],
            'no_option_text'  =>   $data['no_option_text_'.$value],
            'question_type'  =>   'protocol'

        );

        $question_id = ProtocolQuestion::insertGetId($question);
        if($data["question_type_".$value]==1){
            $options=array(
                1 => 'Yes',
                2   => 'No'
            );
            for($i=1; $i<3;$i++){
                $is_correct = $data['answer_'.$value]==$i ? 1 : 2;
                $qdata = array(
                    'question_id'   =>  $question_id,
                    'option'        =>  $options[$i],
                    'is_correct'    =>  $is_correct
                );
                ProtocolQuestionOption::insert($qdata);
            }
        }

    }
}


function getPosts($index, $author=false,$post_status=false){
    $data[$index]= Post::select('posts.*','users.first_name','users.last_name','users.image as profile_image')
        ->leftjoin('users','posts.author_id','=','users.id');
   $data[$index]->when($author!=1,function ($query) use ($author) {
            return $query->where('posts.author_id', Auth::user()->id);
   });
    $data[$index]->when($post_status!=false, function ($query) use ($post_status) {
            $query->where('posts.status', $post_status);
    });
    return $data[$index]->get();
}

