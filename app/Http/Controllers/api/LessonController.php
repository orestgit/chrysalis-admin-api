<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\LessonQuiz;
use App\Models\CourseLesson;
use DB;
use Validator;
/**s
 * @group Lesson Apis
 *
 * APIs for managing Lessons
 */
class LessonController extends Controller
{
    /**
     * @bodyParam lesson_id integer required The lesson_id of the lesson. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "lesson details are bellow",
    "data": {
        "lesson": [
            {
                "lesson_id": 1,
                "title": "134",
                "overview": "Numquam minima non c",
                "summary": "Culpa velit laborio",
                "video": "1637075218.mp4",
                "quiz": [
                    {
                        "quiz_id": 5,
                        "image": "1635838486.png"
                    }
                ]
            }
        ]
    },
    "status": 200
}

      * @response status=400 scenario="lesson_id validation" 
     *{
    "error": {
        "lesson_id": [
            "The lesson id field is required."
        ]
    },
    "status": 400
}

   */
    public function lessonDetails(Request $request){    
        $validator = Validator::make($request->all(), [ 
            'lesson_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
            ], 
            400);  
    }
        $lesson=CourseLesson::select('lesson_id','title','overview','summary','video')
        ->where('lesson_id',$request->lesson_id)
        ->get();
        $lesson[0]['quiz']=LessonQuiz::select('quiz_id','title','image')->where('lesson_id',$request->lesson_id)->get();
        
        return response()->json([
            'message'=>'lesson details are bellow',
            'data'=>[
                'lesson'=>$lesson
            ],
           
            'status'=>200
        ], 
        200);

    }
}
