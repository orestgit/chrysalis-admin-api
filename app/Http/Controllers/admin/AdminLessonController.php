<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseLesson;
use PHPUnit\Framework\Constraint\LessThan;

class AdminLessonController extends Controller
{
    public  function store(Request $request){

        if($request['type']==ONLINE_COURSE) {
            $data = $request->validate([
                'title' => ['required', 'string'],
                'summary' => 'required',
                'overview' => 'required',
            ]);
            $request->validate([
                'video'        =>  'required|mimes:mp4,mov| max:20000'
            ]);
            $video_name = time().'.'.$request->video->extension();
            $request->video->move(public_path('uploads/courses'), $video_name);
            CourseLesson::insert($data+['course_id'=>$request['course_id'],'video'=>$video_name]);
        }
        else{

            $data = $request->validate([
                'title' => ['required', 'string'],
                'overview' => 'required',
                'date'   => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'qr_code'  => 'required',
                'qr_image'  => 'required',

            ]);
            CourseLesson::insert($data+['course_id'=>$request['course_id'],'summary'=>'']);
        }
        return redirect()->back()->with('success','You have successfully added a new lesson');

    }
    public  function  lessonDetail(Request $request){
        $data['heading']='Lesson Details';
        $data['sub_heading']='';
        $data['course_categories']= CourseCategory::all();
        $data['lesson']=CourseLesson::where('lesson_id',$request['lesson_id'])->first();
        $data['course']=Course::where('course_id',$request['course_id'])->first();
        return view('admin.lessons.lesson_detail',$data);
    }
    public function  lessonQuestions(){
        return view('admin.courses.create_quiz');
    }
    public  function delete(Request $request){
        CourseLesson::where('lesson_id',$request['lesson_id'])->delete();
        return redirect()->back()->with('success','Lesson has been deleted ');
    }

    public  function edit(Request $request){
        $data['heading']='Update Lesson Details';
        $data['sub_heading']='';
        $data['course_categories']= CourseCategory::all();
        $data['lesson']=CourseLesson::where('lesson_id',$request['lesson_id'])->first();
        $data['course']=Course::where('course_id',$request['course_id'])->first();
        return view('admin.lessons.edit',$data);
    }
    public  function  update(Request $request){
        if($request['type']==ONLINE_COURSE) {
            $data = $request->validate([
                'title' => ['required', 'string'],
                'summary' => 'required',
                'overview' => 'required',
            ]);
            if($request->hasFile('video')) {
                $request->validate([
                    'video' => 'required|mimes:mp4,mov| max:20000'
                ]);
                $video_name = time().'.'.$request->video->extension();
                $request->video->move(public_path('uploads/courses'), $video_name);
                CourseLesson::where('course_id',$request['course_id'])->update(['video'=>$video_name]);
            }
            CourseLesson::where('course_id',$request['course_id'])->update($data);
        }
        else{

            $data = $request->validate([
                'title' => ['required', 'string'],
                'overview' => 'required',
                'date'   => 'required',
                'start_time' => 'required',
                'end_time' => 'required'
            ]);
            CourseLesson::where('course_id',$request['course_id'])->update($data);
        }
        return redirect()->back()->with('success','Lesson has been updated ');
    }
}
