<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\QuizOption;
use Illuminate\Http\Request;
use App\Models\LessonQuiz;
use App\Models\QuizQuesetion;
use App\Models\Course;
use App\Models\QuizAttempt;
use App\Models\CourseLesson;
use Illuminate\Routing\Route;
use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\exactly;
use Illuminate\Support\Facades\DB;

class AdminLessonQuizController extends Controller
{
    public  function  manageQuiz(Request $request){
        $data['question_count']=0;
        $data['heading']= 'Manage Course Quiz';
        $data['sub_heading']='';
        $data['title']= 'Manage Course Quiz';
        $data['lesson']=CourseLesson::where('lesson_id',$request['lesson_id'])->first();
        $data['quiz_exists']=LessonQuiz::where('lesson_id',$request['lesson_id'])->count();
        if($data['quiz_exists']){
            $data['quiz']=LessonQuiz::where('lesson_id',$request['lesson_id'])->first();
            $data['question_count']=QuizQuesetion::where('quiz_id',$data['quiz']['quiz_id'])->count();
            $data['quiz_submissions']=QuizAttempt::where('quiz_id',$data['quiz']['quiz_id'])->count();
         }
        return view('admin.course_quiz.manage_quiz',$data);
    }
    public  function saveQuiz(Request $request){
        $data = $request->validate([
            'title'        => ['required', 'string','unique:courses'],
             'image'        =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName='';
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses'), $imageName);
        }
        LessonQuiz::insert(['title'=>$request->input('title'),'image'=>$imageName,'lesson_id'=>$request->input('lesson_id')]);
        return redirect()->back()->with('success','You have added the Quiz');
    }
    public  function  updateQuiz(Request $request){
        $data = $request->validate([
            'title'        => ['required', 'string','unique:courses'],
        ]);
        $imageName='';
        if($request->hasFile('image')){
            $image = $request->validate([
                'image'        =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses'), $imageName);

            LessonQuiz::where('lesson_id',$request['lesson_id'])->update(['image'=>$imageName]);
        }
        LessonQuiz::where('lesson_id',$request['lesson_id'])->update($data);
        return redirect()->back()->with('success','You have updated the Quiz successfully');
    }
    public  function  manageQuizQuestions(Request $request){
        $data['heading']= 'Manage Course Quiz';
        $data['sub_heading']='';
        $data['title']= 'Manage Quiz';
        $data['question_count']=QuizQuesetion::where('quiz_id',$request['quiz_id'])->count();
        $data['quiz']= LessonQuiz::where('lesson_id',$request['lesson_id'])->first();
        return view('admin.course_quiz.manage_questions',$data);
    }
    public  function editQuizQuestions(Request $request){
        $data['heading']= 'Manage Quiz Questions';
        $data['sub_heading']='';
        $data['title']= 'Manage Quiz Questions';
        $data['questions']=QuizQuesetion::where('quiz_id',$request['quiz_id'])->get();
        $data['course_id']= CourseLesson::where('lesson_id',$request['lesson_id'])->first()->pluck('course_id')[0];
        foreach ($data['questions'] as $question){
            $question->options=QuizOption::where('question_id',$question['question_id'])->get();
        }
        return view('admin.course_quiz.edit_questions',$data);
    }
    public  function createQuizQuestions(Request  $request){
        add_quiz_qustions($request->all());
        return redirect()->back()->with('success','Questions have been added successfully');
    }
    public  function updateQuizQuestions(Request $request)
    {
        $data['questions'] = QuizQuesetion::select('question_id')->where('quiz_id', $request['quiz_id'])->get();
        foreach ($data['questions'] as $question) {
            $questions_data = array(
                'question' => $request->input("question_" . $question['question_id']),
                'hint' => $request->input("hint_" . $question['question_id']),
            );
            QuizQuesetion::where('question_id', $question['question_id'])->update($questions_data);
            if ($request->input("question_type_" . $question['question_id']) == 1) {
                $answer = $request->input("answer_" . $question['question_id']);
                if ($answer == 1) {
                    QuizOption::where('question_id', $question['question_id'])->where('option', 'Yes')->update(['is_correct' => 1]);
                    QuizOption::where('question_id', $question['question_id'])->where('option', 'No')->update(['is_correct' => 2]);
                } else {
                    QuizOption::where('question_id', $question['question_id'])->where('option', 'Yes')->update(['is_correct' => 2]);
                    QuizOption::where('question_id', $question['question_id'])->where('option', 'No')->update(['is_correct' => 1]);
                }
            }
            if ($request->input("question_type_" . $question['question_id']) == 2) {
                $answer = explode(',', $request->input("answer_" . $question['question_id']));
                $options = array(
                    0 => $request->input('option_1_' . $question['question_id']),
                    1 => $request->input('option_2_' . $question['question_id']),
                    2 => $request->input('option_3_' . $question['question_id']),
                    3 => $request->input('option_4_' . $question['question_id']),
                );
                $update_array = QuizOption::where('question_id', $question['question_id'])->select('option_id', 'is_correct')->get();
                $counter = 0;
                foreach ($update_array as $key => $update) {
                    $counter = $counter + 1;
                    if (in_array($counter, $answer)) {
                        $update_data = array(
                            'option' => $options[$key],
                            'is_correct' => 1,
                        );
                    } else {
                        $update_data = array(
                            'option' => $options[$key],
                            'is_correct' => 2,
                        );

                    }
                    QuizOption::where('option_id', $update['option_id'])->update($update_data);
                }
            }
            if ($request->input("question_type_" . $question['question_id']) == 3) {
                $answer = $request->input("answer_" . $question['question_id']);
                $options = array(
                    0 => $request->input('option_1_' . $question['question_id']),
                    1 => $request->input('option_2_' . $question['question_id']),
                    2 => $request->input('option_3_' . $question['question_id']),
                    3 => $request->input('option_4_' . $question['question_id']),
                );
                $update_array = QuizOption::where('question_id', $question['question_id'])->select('option_id', 'is_correct')->get();
                foreach ($update_array as $key => $update) {
                    if ($request->input('answer_' . $question['question_id']) == $key + 1) {
                        $update_data = array(
                            'option' => $options[$key],
                            'is_correct' => 1
                        );
                    } else {
                        $update_data = array(
                            'option' => $options[$key],
                            'is_correct' => 2,
                        );
                    }
                    QuizOption::where('option_id', $update['option_id'])->update($update_data);
                }
            }
            if ($request->input("question_type_" . $question['question_id']) == 4) {
                $qdata=array();
                $answer = $request->input("answer_" . $question['question_id']);
                $update_array = QuizOption::where('question_id', $question['question_id'])->select('option_id', 'is_correct')->get();

                $loop_count= 0;
                foreach ($update_array as $key => $update) {
                    $imageName='';
                    $loop_count=$loop_count+1;
                     if ($request->hasFile("option_".$loop_count.'_'.$update['option_id'])) {
                         $icon="option_".$loop_count.'_'.$update['option_id'];
                         $imageName = time().'.'.$request->$icon->extension();
                         $request->$icon->move(public_path('uploads/courses'), $imageName);
                    }
                    $is_correct = $answer==$loop_count ? 1 : 2;
                    if($imageName!=='') {
                        QuizOption::where('option_id',$update['option_id'])->update(['is_correct' => $is_correct,'option'=>$imageName]);
                    }
                    else{
                        QuizOption::where('option_id',$update['option_id'])->update(['is_correct' => $is_correct]);
                    }

                }
            }

        }
        add_quiz_qustions($request->all());
        return redirect()->back()->with('success', 'Questions have been updated successfully');
    }
    public  function deleteQuizQuestion(Request $request){
         return QuizQuesetion::where('question_id',$request['question_id'])->delete() ==true? ['success' => 1] :['error' => 1];
    }
}
