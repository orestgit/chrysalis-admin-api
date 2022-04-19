<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostType;
use Illuminate\Database\Eloquent\SoftDeletes;
class AdminPostTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function  index(){
        $data['heading']='Post Types';
        $data['sub_heading']='View, review and create new post types';
        $data['post_types']= PostType::all();
        return view('admin.post_types.index',$data);
    }
    public  function store(Request $request){
        $validated = $request->validate([
            'name'        => ['required', 'string', 'unique:post_types'],
            'label_color'        => ['required', 'string'],
            'label_background_color'=> ['required', 'string'],
            'lable_text_color'=> ['required', 'string'],
        ]);
        PostType::insert($validated);
        return redirect('admin/list-post-types')->with('success','Post type has been created ');
    }
    public  function  delete(Request $request){
        PostType::where('post_type_id',$request['post_id'])->delete();
        return redirect('admin/list-post-types')->with('success','Post type has been deleted ');
    }
    public  function  edit(Request $request){
        $data['heading']='Update Post Types';
        $data['sub_heading']='Please enter the updated name for post type';
        $data['post_data']=PostType::where('post_type_id',$request['post_id'])->first();
        return view('admin.post_types.edit_post_type',$data);
    }
    public  function  update(Request $request){
        $validated = $request->validate([
            'name'        => ['required', 'string'],
            'label_color'        => ['required', 'string'],
            'label_background_color'=> ['required', 'string'],
            'lable_text_color'=> ['required', 'string'],
        ]);
        PostType::where('post_type_id',$request->input('post_type_id'))->update($validated);
        return redirect('admin/list-post-types')->with('success','Post type has been updated ');
    }
    public  function  create(){
        $data['heading']='Creat Post Type';
        $data['sub_heading']='Please enter details for new post type';
         return view('admin.post_types.create_post_type',$data);
    }
}
