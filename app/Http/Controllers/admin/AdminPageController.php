<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function index(){
        $data['title']='Static Pages';
        $data['heading']='Static Pages';
        $data['sub_heading']='Create and manage static pages';
        $data['pages']=StaticPage::where('parent',0)->get();
        foreach ($data['pages'] as $page){
            $page->sub_pages= StaticPage::where('parent',$page['page_id'])->get();
        }
        return view('admin.static_pages.index',$data);
    }
    public  function edit(Request $request){
        $data['title']='Edit Page';
        $data['heading']='Edit Page';
        $data['sub_heading']='Editing static page ';
        $data['current_page']=StaticPage::where('page_id',$request['page_id'])->first();
        $data['pages']=StaticPage::where('parent',0)->get();
        foreach ($data['pages'] as $page){
            $page->sub_pages= StaticPage::where('parent',$page['page_id'])->get();
        }
        return view('admin.static_pages.edit',$data);
    }
    public  function delete(Request $request){
        $parent_page=StaticPage::where('page_id',$request['page_id'])->first();
        if($parent_page['parent']==0){
            StaticPage::where('parent',$parent_page['page_id'])->delete();
        }
        StaticPage::where('page_id',$request['page_id'])->delete();
        return redirect('admin/list-static-pages')->with('success','Page has been deleted successfully');
    }
    public  function  update(Request $request){
        $validated = $request->validate([
            'title'        => ['required', 'string'],
            'content'  => ['required'],
        ]);
        $page_id= $request->input('page_id');
        $imageName='';
        if($request->hasFile('icon')){
            $image_validated = $request->validate([
                'icon'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageName = time().'.'.$request->icon->extension();
            $request->icon->move(public_path('uploads/pages'), $imageName);
            StaticPage::where('page_id',$page_id)->update(['icon'=>$imageName]);
        }
        StaticPage::where('page_id',$page_id)->update($validated+['parent'=>$request->input('parent')]);
        return redirect()->back()->with('success','Page has been updated successfully');
    }
    public  function store(Request $request){
        $validated = $request->validate([
            'title'        => ['required', 'string','unique:static_pages'],
            'content'  => 'required'
        ]);
        $img_validation = $request->validate([
            'icon'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('uploads/pages'), $imageName);
        StaticPage::insert($validated+['parent'=>$request->input('parent'),'icon'=>$imageName]);
        return redirect()->back()->with('success','New static page has been added successfully');

    }
}
