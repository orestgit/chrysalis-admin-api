<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Protocol;
use App\Models\ProtocolQuestion;
use App\Models\ProtocolQuiz;
use App\Models\Attachments;
use App\Models\ProtocolQuestionOption;
use DB;
use App\Models\ProtocolChapter;
use Validator;
use function GuzzleHttp\Promise\all;
use App\Models\ProtocolSubmission;
/**
 * @group Protocol Apis
 *
 * APIs for managing Protocols
 */
class ProtocolController extends Controller
{

/**

     * @bodyParam secret string  required

     * @response
     * {
    "message": "protocols are listed below",
    "data": {
        "protocols": [
            {
                "protocol_id": 4,
                "title": "Protocol for dentists updated",
                "status": 1,
                "created_at": "2021-11-09T17:32:48.000000Z"
            },
            {
                "protocol_id": 6,
                "title": "new protocol",
                "status": 1,
                "created_at": "2021-11-10T14:15:42.000000Z"
            },
            {
                "protocol_id": 7,
                "title": "This is new protocol for testing updated",
                "status": 1,
                "created_at": "2021-11-10T17:03:18.000000Z"
            }
        ]
    },
    "status": 200
}

   */
    public function getProtocols(Request $request){
        $protocols=Protocol::select('protocol_id','title','status','created_at')
        ->get();
        return response()->json([
            'message'=>'protocols are listed below',
            'data'=>[
                'protocols'=>$protocols
            ],
                'status'=>200
           ],
   200);
    }


/**

     * @bodyParam secret string  required
     * @bodyParam title string  required
     * @response
     *{
    "message": "searched protocols are listed below",
    "data": {
        "protocols": [
            {
                "protocol_id": 4,
                "title": "Protocol for dentists updated",
                "status": 1,
                "created_at": "2021-11-09T17:32:48.000000Z"
            }
        ]
    },
    "status": 200
}

* @response status=400 scenario="title validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The title field is required.",
    "status": 400
}

   */

    public function  ProtocolChapters(Request $request){
        $chapters = $request->has('chapter_id')?ProtocolChapter::where('chapter_id',$request['chapter_id'])->get(): ProtocolChapter::all();
        foreach ($chapters as $chapter){
            $chapter->chapter_options = DB::table('protocol_questions')->where('chapter_id',$chapter->chapter_id)
                ->where('question_type','chapter')->get();
                  $chapter->chapter_questions = DB::table('protocol_questions')->where('chapter_id',$chapter->chapter_id)
                ->where('question_type','protocol')->get();
        }
       return  response([
            'message' => 'Following is the list of Protocol chapters ',
            'data'  =>$chapters,
            'status'    =>200
        ], 200);
    }
    public  function  submitProtocol(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'question_type'=>'required',
            'submission_id'=>'required',
            'protocol_id'=>'required',
        ]);
        if ($validator->fails()) {
            $errors = implode(', ', $validator->errors()->all());
            return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        if($request->input('question_type')=='chapter'){
            $options=$request->question_ids;
            foreach($options as $option){
                $submission=new ProtocolSubmission();
                $submission->user_id=$request->input('user_id');
                $submission->question_type='chapter';
                $submission->submission_id=$request->input('submission_id');
                $submission->protocol_id=$request->input('protocol_id');
                $submission->question_id=$option;
            
                $submission->save();
            }
        }
        else{
            $submission=new ProtocolSubmission();
            $submission->user_id=$request->input('user_id');
            $submission->question_type='protocol';
            $submission->submission_id=$request->input('submission_id');
            $submission->protocol_id=$request->input('protocol_id');
            $submission->question_id=$request->input('question_id');
            $submission->question_option=$request->input('question_option');
        
            $submission->save();
        }
        
        if($request->has('submission_status') && $request->input('submission_status')==1){
            ProtocolSubmission::where('submission_id', $request->input('submission_id'))->update(['submission_status' => 1]);
        }

/*
        $optins=$request->option_id;
        foreach($optins as $option){
            $option_details=ProtocolQuestionOption::where('option_id',$option)->first();
            $quiz_id=ProtocolQuestion::where('question_id',$option_details->question_id)->first();
            $question_attempt=new ProtocolQuiz();
            $question_attempt->question_id=$request->question_id;
            $question_attempt->option_id=$option_details->option_id;
            $question_attempt->user_id=$request->user_id;
            $question_attempt->quiz_id=$quiz_id->protocol_id;
            $question_attempt->save();
        }*/
        return response()->json([
            'message'=>'Your answer for this question has been saved',
            'status'=>200
        ],
            200);
    }
    Public function  ChapterQuestions(Request $request){
        $chapter_id= $request['chapter_id'];
        $chpater_questions =ProtocolQuestion::where('chapter_id',$chapter_id)->get();
        return  response([
            'message' => 'Following is the list of Protocol questions ',
            'data'  =>$chpater_questions,
            'status'    =>200
        ], 200);
    }
    public function searchProtocols(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);
        if ($validator->fails()) {
        $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        $title=$request->title;
        $protocols=Protocol::where('title','like',"%$title%")->select('protocol_id','title','status','created_at')
        ->get();

        return response()->json([
            'message'=>'searched protocols are listed below',
            'data'=>[
                'protocols'=>$protocols
            ],
                'status'=>200
           ],
   200);

    }

    public function protocolDetail(Request $request){
        $validator = Validator::make($request->all(), [
            'protocol_id' => 'required'
        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }

        $protocol=Protocol::select('protocol_id','title','content','status','created_at')->where('protocol_id',$request->protocol_id)->first();
        // return $protocol;
        $images=Attachments::select('attachment_id','link')->where('ref_id',$protocol->protocol_id)->where('type','=','protocol')->get();
        $questions=ProtocolQuestion::select('question_id','question')->where('protocol_id',$protocol->protocol_id)->get();
        foreach($questions as $question){
            $answer=ProtocolQuiz::where('question_id',$question->question_id)->where('user_id',$request->user_id)->first();
            if($answer==null){
                $question->answer=false;
            }
            else{
                $question->answer=true;
            }
        }
        return response()->json([
            'message'=>'searched protocols are listed below',
            'data'=>[
                'protocol'=>$protocol,
                'images'=>$images,
                'questions'=>$questions,
            ],
                'status'=>200
           ],
   200);
    }
}
