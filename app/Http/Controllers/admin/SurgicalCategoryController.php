<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\SurgicalCategory;
use Stripe\Util\RandomGenerator;

class SurgicalCategoryController extends Controller{
    public  function index(){

        $data['heading']='Surgical Categories';
        $data['sub_heading']='Surgical Categories';
        $data['categories']=SurgicalCategory::all();
        return view('admin.surgical_categories.index',$data);
    }
    public  function  add(){
        $data['heading']='Add Surgical Category';
        $data['sub_heading']='New Surgical Category';
        return view('admin.surgical_categories.create',$data);
    }
    public  function  store(Request $request){
        $data = $request->validate([
            'title'  => 'required',
        ]);
        SurgicalCategory::insert(['title'=>$request->input('title')]);
        return redirect()->route('surgical-categories')->with('success','Surgical category has been created');
    }
    public  function  edit(Request $request){
        $data['category']=SurgicalCategory::where('id',$request->id)->first();
        $data['heading']='Add Surgical Category';
        $data['sub_heading']='New Surgical Category';
        return view('admin.surgical_categories.edit',$data);
    }
    public  function  update(Request $request){
        SurgicalCategory::where('id',$request->id)->update([
            'title' =>  $request->title,
        ]);
        return redirect()->route('surgical-categories')->with('success','Category details have been updated');
    }

    public  function delete(Request $request){
        SurgicalCategory::where('id',$request['id'])->delete();
        return redirect()->route('surgical-categories')->with('success','Surgical Category has been deleted');
    }
}
