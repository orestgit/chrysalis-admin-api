<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TokenPackages;

class AdminPackagesController extends Controller
{
        public function __construct(){
            $this->middleware('isSuperAdmin');
        }
        public function index(){
        $data['heading']= 'Token Packages';
        $data['packages']=TokenPackages::all();
        $data['sub_heading']='Following is the list of Token Packages';
        $data['title']= 'Manage Token Packages';
        return view('admin.Packages.index',$data);
        }

         public function  create(){
        $data['heading']= 'Create Package';
        $data['title']= 'Create Package';
        $data['sub_heading']='';
        return view('admin.Packages.create',$data);

    }

      public  function  store(Request $request){
        $data = $request->validate([
            'token'  => 'required',
            'price'  =>  'required'
        ]);

            TokenPackages::insert($data);

        return redirect(route('list-packages'))->with('success','Package has been saved');
    }


       public  function  edit(Request $request){
        //    return $request->all();
        $data['heading']= 'Edit Package';
        $data['title']= 'Edit Package';
        $data['sub_heading']='';
        $data['package']=TokenPackages::where('token_packages_id',$request['id'])->first();
        // return $data;
                return view('admin.Packages.edit',$data);

    }
       public  function update(Request  $request){
       $data = $request->validate([
            'token'  => 'required',
            'price'  =>  'required'
        ]);
        TokenPackages::where('token_packages_id',$request->input('id'))->update($data);
        return redirect()->back()->with('success','Package has been updated');
    }

     public  function delete(Request $request){
         TokenPackages::where('token_packages_id',$request['id'])->delete();
         return redirect()->back()->with('success','You have deleted the Package ');
    }
}
