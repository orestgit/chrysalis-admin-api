<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Protocol;
use App\Models\ProtocolQuestion;
use App\Models\ProtocolQuestionOption;
use App\Models\ProtocolQuiz;
use DB;

class AdminProtocolQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function manageQuestions(Request $request){
        $data['heading']= 'Manage Protocol Questions';
        $data['title']= 'Edit Protocol';
        $data['sub_heading']='';
        $data['protocol']=Protocol::where('protocol_id',$request['protocol_id'])->first();
        return view('admin.protocols.manage_questions',$data);
    }
    public  function store(Request $request){
        add_protocol_qustions($request->all());
        return redirect()->back()->with('success','You have added protocol questions ');
    }
    public  function manageProtocolQuestions(Request $request){
        $data['heading']= 'Manage Quiz Questions';
        $data['sub_heading']='';
        $data['title']= 'Manage Quiz Questions';
        $data['questions']=ProtocolQuestion::where('chapter_id',$request['chapter_id'])->where('question_type','protocol')->get();
         foreach ($data['questions'] as $question){
            $question->options=ProtocolQuestionOption::where('question_id',$question['question_id'])->get();
        }
        //dd($data);
        return view('admin.protocols.edit_questions',$data);
    }

    public  function setProtocolQuestions(Request $request)
    {

       $data['questions'] = ProtocolQuestion::select('question_id')->where('chapter_id', $request['chapter_id'])->where('question_type', 'protocol')->get();
         foreach ($data['questions'] as $question) {
            $questions_data = array(
                'question' => $request->input("question_" . $question['question_id']),
                'hint' => $request->input("hint_" . $question['question_id']),
                'yes_option_text' => $request->input("yes_option_text_" . $question['question_id']),
                'no_option_text' => $request->input("no_option_text_" . $question['question_id']),


            );
            ProtocolQuestion::where('question_id', $question['question_id'])->update($questions_data);
            if ($request->input("question_type_" . $question['question_id']) == 1) {
                $answer = $request->input("answer_" . $question['question_id']);
                if ($answer == 1) {
                    ProtocolQuestionOption::where('question_id', $question['question_id'])->where('option', 'Yes')->update(['is_correct' => 1]);
                    ProtocolQuestionOption::where('question_id', $question['question_id'])->where('option', 'No')->update(['is_correct' => 2]);
                } else {
                    ProtocolQuestionOption::where('question_id', $question['question_id'])->where('option', 'Yes')->update(['is_correct' => 2]);
                    ProtocolQuestionOption::where('question_id', $question['question_id'])->where('option', 'No')->update(['is_correct' => 1]);
                }
            }


        }
        add_protocol_qustions($request->all());
        return redirect()->back()->with('success', 'Questions have been updated successfully');
    }

    public function quiz_results(Request $request){
        $data['heading']= 'Quiz Reults';
        $data['sub_heading']='';
        $data['title']= 'Quiz Reults';
        $users=ProtocolQuiz::join('users','users.id','=','protocol_quizzes.user_id')
        ->select('users.id','users.first_name','users.last_name','protocol_quizzes.quiz_id')
        ->where('protocol_quizzes.quiz_id',$request->quiz_id)
        ->distinct()
        ->get();
        $data['users']=$users;
        return view('admin.protocols.quiz_results',$data);
    }
    public function view_attempted_quiz_details(Request $request){
        $data['heading']= 'Quiz Detailed Reults';
        $data['sub_heading']='';
        $data['title']= 'Quiz Detailed Reults';
        $users=ProtocolQuiz::join('protocol_questions','protocol_questions.question_id','=','protocol_quizzes.question_id')
        ->join('protocol_question_options','protocol_question_options.option_id','=','protocol_quizzes.option_id')
        ->select('protocol_questions.question_id','protocol_questions.question as question','protocol_question_options.option_id','protocol_question_options.option as option','protocol_quizzes.quiz_id')
        ->where('protocol_quizzes.quiz_id',$request->quiz_id)
        ->where('protocol_quizzes.user_id',$request->user_id)
        ->get();
        foreach($users as $user){
            $type=ProtocolQuestion::where('question_id', $user->question_id)->value('type');
            if($type==4){
                $user->option_type=4;
            }

        }
        $data['users']=$users;
    //    return $data;
        return view('admin.protocols.quiz_result_details',$data);
    }


}
