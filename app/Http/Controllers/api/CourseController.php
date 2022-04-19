<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMeta;
use App\Models\CourseLesson;
use App\Models\CourseType;
use App\Models\CourseAdvertisement;
use App\Models\CourseLikes;
use App\Models\CourseView;
use App\Models\LessonTaken;
use App\Models\CourseEnrollment;
use DB;
use Validator;
/**
 * @group Course Apis
 *
 * APIs for managing Courses
 */
class CourseController extends Controller
{
      /**
     * @bodyParam type integer required The type of the course. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "course details are bellow",
    "data": {
        "courses": [
            {
                "course_id": 1,
                "course_category": 7,
                "title": "this is title with fixed meta issue",
                "type": 2,
                "price": 100,
                "overview": "11",
                "summary": "summary here",
                "method": "online",
                "lesson_duration": 12,
                "start_date": "2021-11-26",
                "end_date": "2021-11-27",
                "image": "1636704883.png",
                "tags": "tag1,tag2",
                "views": 0,
                "likes": 0,
                "address": null,
                "lat": null,
                "lng": null,
                "status": 4,
                "created_at": "2021-11-12T09:14:43.000000Z",
                "updated_at": "2021-11-12T09:57:56.000000Z",
                "deleted_at": null,
                "lesson_count": 0
            },
            {
                "course_id": 2,
                "course_category": 7,
                "title": "this is title with fixed meta issues",
                "type": 2,
                "price": 100,
                "overview": "11",
                "summary": "summary here",
                "method": "online",
                "lesson_duration": 12,
                "start_date": "2021-11-26",
                "end_date": "2021-11-27",
                "image": "1636704944.jpg",
                "tags": "tag1,tag2",
                "views": 0,
                "likes": 0,
                "address": "Lahore, Pakistan",
                "lat": "31.5203696",
                "lng": "74.35874729999999",
                "status": 4,
                "created_at": "2021-11-12T09:15:44.000000Z",
                "updated_at": "2021-11-12T08:15:44.000000Z",
                "deleted_at": null,
                "lesson_count": 0
            }
        ]
    },
    "status": 200
}

      * @response status=400 scenario="type validation" 
     *{
    "error": {
        "lesson_id": [
            "The type field is required."
        ]
    },
    "status": 400
}

   */

public function viewCourse(Request $request){
        // return $request->all();
        $categories=CourseCategory::select('course_category_id','name','icon')->get();
        $coursetype=CourseType::get();
        $courseadvertisement=CourseAdvertisement::get();
        $mycourses=CourseEnrollment::join('courses','courses.course_id','=','course_enrollments.course_id')
        ->select('courses.course_id','courses.title','courses.image')
        ->where('course_enrollments.user_id',$request->user_id)
        ->limit(2)->get();
        \DB::statement("SET SQL_MODE=''");
        $courses=Course::select('courses.*','course_types.lable_color','course_types.lable_background_color','course_types.lable_text_color', DB::raw('count(course_lessons.course_id) as lesson_count'))
        ->leftJoin('course_lessons', 'course_lessons.course_id', '=', 'courses.course_id')
        ->leftJoin('course_types','course_types.value', '=','courses.type')
        ->groupBy('courses.course_id');
       if($request->has('type') && $request->has('category')){
            $courses=$courses->where('type',$request->type)
            ->where('course_category',$request->category);
        }
        elseif($request->has('type')){
            $courses=$courses ->where('type',$request->type);
            }
            
        elseif($request->has('category')){
            $courses=$courses ->where('course_category',$request->category);
        }
        else{
            $courses=$courses;       
         }
         $courses=$courses->get();
         
         foreach($courses as $course){
            $check_liked=CourseLikes::where('course_id',$course->course_id)->where('user_id',$request->user_id)->first();
            if($check_liked==null){
                $course->isliked=false;
            }
            else{
                $course->isliked=true;
            }
            
            $check_viewed=CourseView::where('course_id',$course->course_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $course->isViewed=false;
            }
            else{
                $course->isViewed=true;
            }
           
        }
        return response()->json([
            'message'=>'courses are bellow',
            'data'=>[
                'categories'=>$categories,
                'course_advertisement'=>$courseadvertisement,
                'my-courses'=>$mycourses,
                'course_type'=>$coursetype,
                'courses'=>$courses
            ],
           
            'status'=>200
        ], 
        200);
    }    /**
     * @bodyParam course_id integer required The id of the course. 
     * @bodyParam secret string  required 

     * @response
     * {
        "message": "course details are bellow",
        "data": {
            "course": [
                {
                    "id": 3,
                    "title": "this is online course",
                    "lesson_duration": 696,
                    "type": 1,
                    "method": "In-class",
                    "price": 513,
                    "summary": "Cumque cum praesenti",
                    "image": "1637075153.jpg",
                    "views": 0,
                    "likes": 0,
                    "total_lesson": 1,
                    "lessons": [
                        {
                            "lesson_id": 1,
                            "course_id": 3,
                            "title": "134",
                            "overview": "Numquam minima non c",
                            "summary": "Culpa velit laborio",
                            "video": "1637075218.mp4",
                            "date": null,
                            "start_time": null,
                            "end_time": null,
                            "qr_code": null,
                            "qr_image": null,
                            "created_at": "2021-11-16T16:06:58.000000Z",
                            "updated_at": "2021-11-16T16:06:58.000000Z",
                            "deleted_at": null
                        }
                    ]
                }
            ]
        },
        "status": 200
    }
      * @response status=400 scenario="course_id validation" 
     *{
    "error": {
        "lesson_id": [
            "The course id field is required."
        ]
    },
    "status": 400
}

   */
    public function courseDetails(Request $request){
        $validator = Validator::make($request->all(), [ 
            'course_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
            ], 
            400);  
    }
        $course=Course::select('courses.course_id as id','courses.title','courses.lesson_duration','courses.type','courses.method','courses.price','courses.summary','courses.overview','courses.image','courses.views','courses.likes','course_types.lable_color','course_types.lable_background_color','course_types.lable_text_color')
                ->Join('course_types','course_types.value', '=','courses.type')
                ->where('courses.course_id',$request->course_id)
                ->first();
                // return $course;
            $course->total_lesson=CourseLesson::where('course_id',$course->id)->count();
            $lessons=CourseLesson::where('course_id',$course->id)->get();
                foreach($lessons as $lesson){
                $check_lesson_status=LessonTaken::where('lesson_id',$lesson->lesson_id)->where('user_id',$request->user_id)->first();
                if($check_lesson_status==null){
                    $lesson->status='pending';
                }
                elseif($check_lesson_status==1){
                    $lesson->status='inprogress';

                }
                else{
                    $lesson->status='completed';
                }
            }
            $course->lessons=$lessons;

            
             $check_liked=CourseLikes::where('course_id',$course->id)->where('user_id',$request->user_id)->first();
            if($check_liked==null){
                $course->isliked=false;
            }
            else{
                $course->isliked=true;
            }
            $course_view=CourseView::where('course_id',$request->course_id)->where('user_id',$request->user_id)->get();
            $count=count($course_view); 
            // return $count;
            if($count==0){
                $course_view_save= new CourseView();
                $course_view_save->course_id=$request->course_id;
                $course_view_save->user_id=$request->user_id;
                $course_view_save->save();
                $count1=CourseView::where('course_id',$request->course_id)->count();
                $count2=$count1;
                 $course_view_count=Course::where('course_id',$request->course_id)->update([
                'views'=>$count2
            ]);        
            
            $course->views=$count2;
                
            }
            else{
                  $count1=CourseView::where('course_id',$request->course_id)->count();
                $coun2t=$count1+1;
                 $course_view_count=Course::where('course_id',$request->course_id)->value('views');
                 $course->views=$course_view_count;
            }
            
            
            $check_viewed=CourseView::where('course_id',$request->course_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $course->isViewed=false;
            }
            else{
                $course->isViewed=true;
            }
            
        return response()->json([
            'message'=>'course details are bellow',
            'data'=>[
                'course'=>$course
            ],
           
            'status'=>200
        ], 
        200);
    }
    
        public function likeCourse(Request $request){
         $validator = Validator::make($request->all(), [ 
            'user_id' => 'required',
            'course_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
                ], 
                400);  
        }
        $like_check=CourseLikes::where('course_id',$request->course_id)->where('user_id',$request->user_id)->get();
        $count=count($like_check);   
        if($count==0){
            $check=new CourseLikes();
            $check->user_id=$request->user_id;
            $check->course_id=$request->course_id;
            $check->save();
            $count=$count+1;
            $course=Course::where('course_id',$check->course_id)->update([
                'likes'=>$count
            ]);
            return response()->json([
                'message'=>'you have  liked course',
            
                    'status'=>200
            ], 
            200);
        }
        else{
            $like_check=CourseLikes::where('course_id',$request->course_id)->where('user_id',$request->user_id)->delete();
            $count=$count-1;
            $course=Course::where('course_id',$request->course_id)->update([
                'likes'=>$count
            ]);
            return response()->json([
            'message'=>'you have been disliked course',
            'status'=>200,
            ], 
            200);
        }
 
    }

    public function user_course_details(Request $request){
        $coursetype=CourseType::get();

        \DB::statement("SET SQL_MODE=''");
        $courses=Course::select('courses.*','course_types.lable_color','course_types.lable_background_color','course_types.lable_text_color', DB::raw('count(course_lessons.course_id) as lesson_count'))
        ->leftJoin('course_lessons', 'course_lessons.course_id', '=', 'courses.course_id')
        ->leftJoin('course_types','course_types.value', '=','courses.type')
        ->join('course_enrollments','courses.course_id','=','course_enrollments.course_id')
        ->groupBy('courses.course_id')
        ->where('course_enrollments.user_id',$request->user_id);
       if($request->has('type') && $request->has('category')){
            $courses=$courses->where('type',$request->type)
            ->where('course_category',$request->category);
        }
        elseif($request->has('type')){
            $courses=$courses ->where('type',$request->type);
            }
            
        elseif($request->has('category')){
            $courses=$courses ->where('course_category',$request->category);
        }
        else{
            $courses=$courses;       
         }
         $courses=$courses->get();
         
         foreach($courses as $course){
            $check_liked=CourseLikes::where('course_id',$course->course_id)->where('user_id',$request->user_id)->first();
            if($check_liked==null){
                $course->isliked=false;
            }
            else{
                $course->isliked=true;
            }
            
            $check_viewed=CourseView::where('course_id',$course->course_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $course->isViewed=false;
            }
            else{
                $course->isViewed=true;
            }
           
        }
        return response()->json([
            'message'=>'courses are bellow',
            'data'=>[
                'course_type'=>$coursetype,
                'courses'=>$courses
            ],
           
            'status'=>200
        ], 
        200);
    }   

        
}
