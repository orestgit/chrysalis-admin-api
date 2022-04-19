<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseAdvertisement;
class AdminCourseAdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public function index(){
        $data['heading']= 'Course Advertisement';
        $data['advertistment']=CourseAdvertisement::all();
        $data['sub_heading']='Following is the list of Course Advertisement';
        $data['title']= 'Manage Course Advertisement';
        return view('admin.course_banner.index',$data);
        }

        public function  create(){
            $data['heading']= 'Create Course Advertisement';
            $data['title']= 'Create Course Advertisement';
            $data['sub_heading']='';
            return view('admin.course_banner.create',$data);

        }

        public  function  store(Request $request){
            $data = $request->validate([
                'description'  => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'background_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link'  =>  'required'
            ]);
            $image=$request->image;
            $background_image=$request->background_image;
            $imageName = rand(1111111111,9999999999).'.'.$image->extension();
            $image->move(public_path().'/uploads/course_banncers/', $imageName);
            $background_imageName = rand(1111111111,9999999999).'.'.$background_image->extension();
            $background_image->move(public_path().'/uploads/course_banncers/', $background_imageName);
            $CourseAdvertisement=new CourseAdvertisement();
            $CourseAdvertisement->description=$request->description;
            $CourseAdvertisement->link=$request->link;
            $CourseAdvertisement->image=$imageName;
            $CourseAdvertisement->background_image=$background_imageName;
            $CourseAdvertisement->save();
            // return $CourseAdvertisement;
            return redirect(route('course-banners'))->with('success','course Banners has been saved');
        }

        public  function  edit(Request $request){

            $data['heading']= 'Edit Advertisement';
            $data['title']= 'Edit Advertisement';
            $data['sub_heading']='';
            $data['Advertisement']=CourseAdvertisement::where('course_advertisements_id',$request['id'])->first();
            // return $data;
                    return view('admin.course_banner.edit',$data);

        }

        public  function update(Request  $request){
            $data = $request->validate([
                'description'  => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'background_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link'  =>  'required'
            ]);
            $image=$request->image;
            $background_image=$request->background_image;
            $imageName = rand(1111111111,9999999999).'.'.$image->extension();
            $image->move(public_path().'/uploads/course_banncers/', $imageName);
            $background_imageName = rand(1111111111,9999999999).'.'.$background_image->extension();
            $background_image->move(public_path().'/uploads/course_banncers/', $background_imageName);
            CourseAdvertisement::where('course_advertisements_id',$request->input('id'))->update(['description'=>$request->description,'link'=>$request->link,'image'=>$imageName,'background_image'=>$background_imageName]);
             return redirect(route('course-banners'))->with('success','Advertisment has been updated');
         }

         public  function delete(Request $request){
            //  return $request->all();
            CourseAdvertisement::where('course_advertisements_id',$request['id'])->delete();
            return redirect()->back()->with('success','You have deleted the Advertisment ');
       }
}
