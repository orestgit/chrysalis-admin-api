<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\LessonQuiz;
use App\Models\CourseLesson;
use App\Models\QuizQuesetion;
use App\Models\QuizOption;
use App\Models\QuizAttempt;
use App\Models\ProtocolQuestionOption;
use App\Models\ProtocolQuestion;
use App\Models\ProtocolQuiz;
use DB;
use Validator;
/**
 * @group Quiz Apis
 *
 * APIs for managing Quizs
 */
class QuizController extends Controller
{
    /**
     * @bodyParam quiz_id integer required The id of the quiz. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "quiz details is below",
    "data": {
        "quizs": [
            {
                "question_id": 46,
                "quiz_id": 10,
                "question": "Obcaecati ullam face",
                "hint": "Magni ut commodo nat",
                "type": 1,
                "created_at": "2021-11-05T17:02:00.000000Z",
                "updated_at": "2021-11-05T17:02:00.000000Z",
                "deleted_at": null,
                "options": [
                    {
                        "option_id": 114,
                        "question_id": 46,
                        "option": "Yes",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 115,
                        "question_id": 46,
                        "option": "No",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    }
                ]
            },
            {
                "question_id": 47,
                "quiz_id": 10,
                "question": "Pariatur Omnis volu",
                "hint": "A voluptate repudian",
                "type": 2,
                "created_at": "2021-11-05T17:02:00.000000Z",
                "updated_at": "2021-11-05T17:02:00.000000Z",
                "deleted_at": null,
                "options": [
                    {
                        "option_id": 116,
                        "question_id": 47,
                        "option": "Quia quidem proident",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 117,
                        "question_id": 47,
                        "option": "Libero dolores reici",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 118,
                        "question_id": 47,
                        "option": "Est expedita error q",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 119,
                        "question_id": 47,
                        "option": "Quas et sunt quae re",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    }
                ]
            },
            {
                "question_id": 48,
                "quiz_id": 10,
                "question": "Alias cillum veniam",
                "hint": "Ad voluptatem eligen",
                "type": 3,
                "created_at": "2021-11-05T17:02:00.000000Z",
                "updated_at": "2021-11-05T17:02:00.000000Z",
                "deleted_at": null,
                "options": [
                    {
                        "option_id": 120,
                        "question_id": 48,
                        "option": "Commodi beatae minus",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 121,
                        "question_id": 48,
                        "option": "Impedit accusamus n",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:00.000000Z",
                        "updated_at": "2021-11-05T17:02:00.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 122,
                        "question_id": 48,
                        "option": "Quisquam dolores fug",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 123,
                        "question_id": 48,
                        "option": "Sed eligendi aliquid",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    }
                ]
            },
            {
                "question_id": 49,
                "quiz_id": 10,
                "question": "Qui magni sunt dolor",
                "hint": "Culpa qui ullam null",
                "type": 4,
                "created_at": "2021-11-05T17:02:01.000000Z",
                "updated_at": "2021-11-05T17:02:01.000000Z",
                "deleted_at": null,
                "options": [
                    {
                        "option_id": 124,
                        "question_id": 49,
                        "option": "1294705576.jpg",
                        "is_correct": 1,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 125,
                        "question_id": 49,
                        "option": "4606618650.png",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 126,
                        "question_id": 49,
                        "option": "3067659607.jpg",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    },
                    {
                        "option_id": 127,
                        "question_id": 49,
                        "option": "3042335406.png",
                        "is_correct": 2,
                        "created_at": "2021-11-05T17:02:01.000000Z",
                        "updated_at": "2021-11-05T17:02:01.000000Z",
                        "deleted_at": null
                    }
                ]
            }
        ]
    },
    "status": 200
}

      * @response status=400 scenario="quiz_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The quiz id field is required.",
    "status": 400
}
   */
    public function getQuiz(Request $request){
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required',

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
    $quizs=QuizQuesetion::where('quiz_id',$request->quiz_id)->get();
    // return $quizs;
    foreach($quizs as $quiz){
    $quiz_status=QuizAttempt::where('question_id',$quiz->question_id)->where('user_id',$request->user_id)->first();
    if($quiz_status==null){
        $quiz->status=false;
    }
    else{
        $quiz->status=true;
    }
}
    // return $quizs;
    $i=0;
    foreach($quizs as $quiz){
        $quiz->options=QuizOption::where('question_id',$quiz->question_id)->get();
      $i++;  
    }
    
            return response()->json([
                     'message'=>'quiz details is below',
                     'data'=>[
                         'quizs'=>$quizs
                     ],
                         'status'=>200
                    ], 
            200);
    }

/**
     * @bodyParam option_id integer required The id of the option. 
     * @bodyParam question_id integer required The id of the question. 
     * @bodyParam user_id array required The id of the user. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "Your answer for this question has been saved",
    "status": 200
}

      * @response status=400 scenario="question_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The question id field is required.",
    "status": 400
}

 * @response status=400 scenario="option_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The question id field is required.",
    "status": 400
}

 * @response status=400 scenario="user_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The user id field is required.",
    "status": 400
}
   */

    public function AttemptQuiz(Request $request){
        $validator = Validator::make($request->all(), [
            'option_id' => 'required',
            'question_id' => 'required',
            'user_id' => 'required',
            

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        $optins=$request->option_id;
        foreach($optins as $option){
            $option_details=QuizOption::where('option_id',$option)->first();
            $quiz_id=QuizQuesetion::where('question_id',$option_details->question_id)->first();
            $question_attempt=new QuizAttempt();
            $question_attempt->question_id=$request->question_id;
            $question_attempt->option_id=$option_details->option_id;
            $question_attempt->is_correct=$option_details->is_correct;
            $question_attempt->user_id=$request->user_id;
            $question_attempt->quiz_id=$quiz_id->quiz_id;
            $question_attempt->save();
        }
        return response()->json([
            'message'=>'Your answer for this question has been saved',
                'status'=>200
           ], 
   200);

    }
    
/**
     * @bodyParam option_id integer required The id of the option. 
     * @bodyParam question_id integer required The id of the question. 
     * @bodyParam user_id array required The id of the user. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "Your quiz submited successfully",
    "score": 0,
    "status": 200
}
    

 * @response status=400 scenario="quiz_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The quiz id field is required.",
    "status": 400
}

 * @response status=400 scenario="user_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The user id field is required.",
    "status": 400
}
   */
    public function getQuizResult(Request $request){
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        } 
        $quizs=QuizQuesetion::where('quiz_id',$request->quiz_id)->get();
        $result=[];
        $i=0;
        $sum=0;
        foreach($quizs as $quiz){
            if($quiz->type==2){
                $quizeoption=QuizOption::where('question_id',$quiz->question_id)->where('is_correct',1)->count();
                $result[$i]['correct']=QuizAttempt::where('question_id',$quiz->question_id)->where('user_id',$request->user_id)->where('is_correct',1)->count();
                if( $result[$i]['correct']==$quizeoption){
                    $sum=$sum+1;
                } 
            }
            else{
        $result[$i]['correct']=QuizAttempt::where('question_id',$quiz->question_id)->where('user_id',$request->user_id)->where('is_correct',1)->count();
        if( $result[$i]['correct']==1){
            $sum=$sum+1;
        }  
    }
        $i++;
    }

        return response()->json([
            'message'=>'Your quiz submited successfully',
                'score'=>$sum,
                'status'=>200
           ], 
   200);


    }

public function protocolQuizQuestion(Request $request){
    $validator = Validator::make($request->all(), [
        'question_id' => 'required',
        

    ]);
    if ($validator->fails()) {

      $errors = implode(', ', $validator->errors()->all());
      return  response([
            'message' => 'Please fix the following error to continue',
            'errors'   => $errors,
            'status'    =>400
        ], 400);
    }
    $questions=ProtocolQuestion::select('question_id','hint','question')->where('question_id',$request->question_id)->first();
    $options=ProtocolQuestionOption::select('option_id','option','is_correct')->where('question_id',$request->question_id)->get();
    return response()->json([
        'message'=>'Question details is below',
        'data'=>[
            'question'=>$questions,
            'options'=>$options,
        ],
            'status'=>200
       ], 
200);

}


public function AttemptProtcolQuiz(Request $request){
    $validator = Validator::make($request->all(), [
        'option_id' => 'required',
        'question_id' => 'required',
        'user_id' => 'required',
        

    ]);
    if ($validator->fails()) {

      $errors = implode(', ', $validator->errors()->all());
      return  response([
            'message' => 'Please fix the following error to continue',
            'errors'   => $errors,
            'status'    =>400
        ], 400);
    }
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
    }
    return response()->json([
        'message'=>'Your answer for this question has been saved',
            'status'=>200
       ], 
200);

    }
}