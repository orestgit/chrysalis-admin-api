<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class AdminCourseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function  create(){
        $data['heading']='Course Categories';
        $data['sub_heading']='Creat Course Category';
        return view('admin.course_categories.create',$data);
    }
    public  function  store(Request $request){
        $validated = $request->validate([
            'name'        => ['required', 'string','unique:course_categories'],
            'icon'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('uploads/courses'), $imageName);
        CourseCategory::insert(['name'=>$request->input('name'), 'icon'=> $imageName]);
        return redirect('admin/list-course-categories')->with('success','Post type has been created ');
    }
    public  function  index(){
        $data['courses']=Course::all();
        $data['heading']='Course Categories';
        $data['sub_heading']='Following is the list of course categories';
        $data['course_categories']=CourseCategory::all();
        return view('admin.course_categories.index',$data);
    }
    public function edit(Request $request){
        $data['heading']='Edit Course Category';
        $data['sub_heading']='';
        $data['course_categories']=CourseCategory::where('course_category_id',$request['course_category_id'])->first();
        return view('admin.course_categories.edit',$data);
    }
    public function update(Request $request){
        $validated = $request->validate([
            'name'        => ['required', 'string'],
        ]);
        if($request->hasFile('icon')){
            $validated = $request->validate([
                'icon'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageName = time().'.'.$request->icon->extension();
            $request->icon->move(public_path('uploads/courses'), $imageName);
            CourseCategory::where('course_category_id',$request->input('course_category_id'))->update(['icon'=>$imageName]);
        }
        CourseCategory::where('course_category_id',$request->input('course_category_id'))->update(['name'=>$request->input('name')]);
         return redirect('admin/list-course-categories')->with('success','Course category has been updated ');
    }
    public  function  delete(Request $request){
        CourseCategory::where('course_category_id',$request['course_category_id'])->delete();
        return redirect('admin/list-course-categories')->with('success','Course category has been deleted ');
    }
}
