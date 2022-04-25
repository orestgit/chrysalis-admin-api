<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\SurgicalQuestionOption;
use Illuminate\Http\Request;
use App\Models\SurgicalCategory;
use App\Models\SurgicalQuestion;
use DB;
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
        add_surgical_questions($request->all());
        return redirect()->back()->with('success','Data has been updated successfully');
    }

    public function deleteSurgicalQuestion(Request $request){
        return SurgicalQuestion::where('question_id',$request['question_id'])->delete() ==true? ['success' => 1] :['error' => 1];

    }
}
