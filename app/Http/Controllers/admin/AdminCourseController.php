<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMeta;
use App\Models\CourseLesson;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DB;
class AdminCourseController extends Controller
{
    public  function  create(){
        $data['course_categories']= CourseCategory::all();
        $data['heading']='Create Course ';
        $data['title']='Manage Courses';
        $data['sub_heading']='Please provide  following details to create course';
        return view('admin.courses.create',$data);
    }
    public  function  index(){
        \DB::statement("SET SQL_MODE=''");
        $data['courses']=Course::select('courses.*', DB::raw('count(course_lessons.course_id) as lesson_count'),
            DB::raw('count(course_enrollments.course_id) as students_count') )
            ->leftJoin('course_lessons', 'course_lessons.course_id', '=', 'courses.course_id')
            ->leftJoin('course_enrollments', 'course_enrollments.course_id', '=', 'courses.course_id')
            ->groupBy('courses.course_id')
            ->when(Auth::user()->user_role!=1,function ($query) {
                return $query->where('courses.author_id', Auth::user()->id);
            })->get();

        $data['course_categories']= CourseCategory::all();
        $data['heading']='Courses Listing';
        $data['sub_heading']='Following is the list of courses';
        return view('admin.courses.index',$data);
    }
    public  function  store(Request $request){
        $status = Auth::user()->user_role==1? APPROVED  : WAITING_APPROVAL;
        $data = $request->validate([
            'title'                  => ['required', 'string','unique:courses'],
            'type'                   =>  'required',
            'course_category'        =>  'required',
            'price'                  =>  'required',
            'summary'                =>  'required',
            'overview'               =>  'required',
            'tags'                   =>  'required',
            'method'                 =>  'required',
            'lesson_duration'        =>  'required',
            'start_date'             =>  'required',
            'end_date'               =>  'required',

        ]);
        $validated = $request->validate([
            'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $class_location=array();
        if($request->input('type')==OFFLINE_COURSE){
            $class_location=$request->validate([
                'address'        => 'required',
                'lat'            => 'required',
                'lng'            => 'required',
            ]);
        }
        $imageName='';
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses'), $imageName);
        }


       $course_id=Course::insertGetId($data+['image'=>$imageName,'status'=>$status,'author_id'=> Auth::user()->id]);
       if(!empty($class_location)) {Course::where('course_id',$course_id)->update($class_location);}
       return redirect('admin/list-courses')->with('Success','You have added a new Course');
    }
    public function edit(Request $request){
        $data['heading']=$request['type'].' Course Details';
        $data['sub_heading']='';
        $data['course_categories']= CourseCategory::all();
        $data['lesson_count']=CourseLesson::where('course_id',$request['course_id'])->count();
        $data['lessons']=CourseLesson::where('course_id',$request['course_id'])->get();
        $data['course']=Course::where('course_id',$request['course_id'])->first();
        return view('admin.courses.edit',$data);
    }
    public function update(Request $request){
        if($request->input('action')){
            if(Course::whereIn('course_id', json_decode($request->input('data')))->update(['status'=>$request->input('action')])) {
                return ['success' => 1];
            }
            else{
                return ['error' => 1];
            }
        }

        $data = $request->validate([
            'title'        => ['required', 'string'],
            'course_category'        =>  'required',
            'price'          =>  'required',
            'summary'        =>  'required',
            'overview'        =>  'required',
            'tags'           =>  'required',
            'method'           =>  'required',
            'lesson_duration'           =>  'required',
            'start_date'           =>  'required',
            'end_date'           =>  'required',
        ]);
        $meta=array();
        if($request->input('type')==OFFLINE_COURSE){
            $class_location=$request->validate([
                'address'        => ['required'],
                'lat'            => ['required'],
                'lng'        => ['required'],
            ]);
            Course::where('course_id',$request->input('course_id'))->update($class_location);
        }
        $imageName='';
        if($request->hasFile('image')){
            $validated = $request->validate([
                'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/courses'), $imageName);
            Course::where('course_id',$request->input('course_id'))->update($validated);
        }
        Course::where('course_id',$request->input('course_id'))->update($data);
        return redirect()->back()->with('success','Course details have been updated ');
    }
    public  function  delete(Request $request){
        Course::where('course_id',$request['course_id'])->delete();
        return redirect('admin/list-courses')->with('success','Course  has been deleted ');

    }
    public  function courseEnrollments(Request $request){
        $data['heading']='Course Enrollments';
        $data['sub_heading']='Course Enrollments Details';
        $data['course_details']= Course::select('title')->where('course_id',$request['course_id'])->first();
        $data['enrollments']= CourseEnrollment::where('course_enrollments.course_id',$request['course_id'])
            ->leftjoin('users','course_enrollments.user_id','=','users.id')
            ->select('course_enrollments.*','users.first_name','users.last_name')
            ->get();
        /*dd($data);*/
        return view('admin.courses.course_enrollments',$data);
    }


}
