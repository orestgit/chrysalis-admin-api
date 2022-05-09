<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\SurgicalQuestionOption;
use Illuminate\Http\Request;
use App\Models\SurgicalCategory;
use App\Models\SurgicalQuestion;
use DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class AdminSurgicalQuestionController extends Controller{
    public  function  index(Request $request){
        $data['heading']='Surgical Algoritm Form';
        $data['sub_heading']='Surgical Algoritm Form';
        $data['title']= 'Manage Quiz Questions';
        $data['questions']=SurgicalQuestion::where('chapter_id',$request['id'])->get();
        foreach ($data['questions'] as $question){
            $question->options=SurgicalQuestionOption::where('question_id',$question['question_id'])->get();
                foreach ($question->options as $option){
                    $option->images = DB::table('attachments')->select('link','attachment_id')->where('ref_id',$option->option_id)->where('type','surgical')->get();
            }

        }
        return view('admin.surgical_questions.edit_questions',$data);
    }
    public  function  setQuestions(Request $request){
        $questions= SurgicalQuestion::where('chapter_id',$request->chapter_id)->get();
        if(count($questions)>0){
            foreach ($questions as $question){
                SurgicalQuestion::where('question_id',$question->question_id)->update([
                        'question'  =>  $request->input("question_".$question->question_id),
                        'hint'      =>  $request->input("hint_".$question->question_id),
                    ]);
                $question_option= SurgicalQuestionOption::where('question_id',$question->question_id)->get();
                if(sizeof($question_option)>0){
                    foreach ($question_option as $option){
                        SurgicalQuestionOption::where('option_id',$option->option_id)->update([
                            'heading'       =>   $request->input('option_heading_'.$option->option_id) ? $request->input('option_heading_'.$option->option_id): '',
                            'hint'          =>   $request->input('option_hint_'.$option->option_id) ? $request->input('option_hint_'.$option->option_id): '',
                            'hint_color'    =>   $request->input('option_hint_color_'.$option->option_id) ? $request->input('option_hint_color_'.$option->option_id): '',
                            'text'          =>   $request->input('option_text_'.$option->option_id) ? $request->input('option_text_'.$option->option_id): '',
                        ]);
                        if($request->has("option_images_".$option->option_id)){
                            foreach ( $request->file("option_images_".$option->option_id) as $image) {
                                $image_name = rand(1111111111,9999999999).'.'.$image->extension();
                                $image->move(public_path('uploads/surgical'), $image_name);
                                DB::table('attachments')->insert([
                                    'ref_id'    =>  $option->option_id,
                                    'link'      =>  $image_name,
                                    'type'      =>  'surgical',
                                ]);
                            }
                        }
                    }

                }
            }
            foreach ($questions as $question) {
                if ($request->has('existing_options_count_'.$question->question_id) && $request->input('existing_options_count_' . $question->question_id) != null) {
                    $option_to_update = explode(",", $request->input('existing_options_count_' . $question->question_id));
                    foreach ($option_to_update as $value) {
                        $val=  explode("_", $value)[1];

                        /*      dd($request->input('existing_hint_50_1'));
                        dd( $request->input('existing_heading_'.$question->question_id .'_'.$val));*/
                        $new_question_option= array(
                            'question_id' => $question->question_id,
                            'heading' => $request->input('existing_heading_' . $question->question_id.'_'.$val),
                            'text' => $request->input('existing_text_' . $question->question_id.'_'.$val),
                            'hint' => $request->input('existing_hint_' . $question->question_id.'_'.$val),
                            'hint_color' => $request->input('existing_hint_color_'.$question->question_id.'_'.$val),
                        );
                        DB::table('surgical_question_options')->insert($new_question_option);
                    }
                }
            }
        }
        if($request->has('options_count')) {
            add_surgical_questions($request->all());
        }
        return redirect()->back()->with('success','Data has been updated successfully');
    }

    public function deleteSurgicalQuestion(Request $request){
        return SurgicalQuestion::where('question_id',$request['question_id'])->delete() ==true? ['success' => 1] :['error' => 1];
    }
    public function deleteSurgicalQuestionOption(Request $request){
        return SurgicalQuestionOption::where('option_id',$request['id'])->delete() ==true? ['success' => 1] :['error' => 1];
    }
    public  function updatequestionOptions(Request $request,$option){
        $data['heading']='Surgical Algoritm Form';
        $data['sub_heading']='Surgical Algoritm Form';
        $data['title']= 'Manage Quiz Questions';
        if($request->has("option_images_".$option->option_id)){
            foreach ( $request->file("option_images_".$option->option_id) as $image) {
                $image_name = rand(1111111111,9999999999).'.'.$image->extension();
                $image->move(public_path('uploads/surgical'), $image_name);
                DB::table('attachments')->insert([
                    'ref_id'    =>  $option->option_id,
                    'link'      =>  $image_name,
                    'type'      =>  'surgical',
                ]);
            }
        }
        return view('admin.surgical_questions.update_question',$data);

    }
}
