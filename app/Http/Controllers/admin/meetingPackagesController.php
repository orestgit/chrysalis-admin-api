<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingPackages;
class meetingPackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public function index(){
        $data['heading']= 'Meeting Token Packages';
        $data['packages']=MeetingPackages::all();
        $data['sub_heading']='Following is the list of Meeting Token Packages';
        $data['title']= 'Manage Meeting Token Packages';
        return view('admin.MeetingPackages.index',$data);
    }

         public function  create(){
        $data['heading']= 'Create Meeting Package';
        $data['title']= 'Create Meeting Package';
        $data['sub_heading']='';
        return view('admin.MeetingPackages.create',$data);

    }

      public  function  store(Request $request){
        $data = $request->validate([
            'token'  => 'required',
            'price'  =>  'required',
            'duration'=>'required',
        ]);

            MeetingPackages::insert($data);

        return redirect(route('list-meeting-packages'))->with('success','Package has been saved');
    }


       public  function  edit(Request $request){
        $data['heading']= 'Edit Meeting Package';
        $data['title']= 'Edit Meeting Package';
        $data['sub_heading']='';
        $data['package']=MeetingPackages::where('meeting_packages_id',$request['id'])->first();
        // return $data;
                return view('admin.MeetingPackages.edit',$data);

    }
       public  function update(Request  $request){
        $data = $request->validate([
            'token'  => 'required',
            'price'  =>  'required',
            'duration'=>'required',
        ]);

        MeetingPackages::where('meeting_packages_id',$request->input('id'))->update($data);
        return redirect(route('list-meeting-packages'))->with('success','Package has been updated');

    }

     public  function delete(Request $request){
         MeetingPackages::where('meeting_packages_id',$request['id'])->delete();
         return redirect(route('list-meeting-packages'))->with('success','You have deleted the Package');

    }
}
