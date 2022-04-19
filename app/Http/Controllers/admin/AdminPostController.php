<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostType;
use Illuminate\Support\Facades\Auth;
use DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class AdminPostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('isSuperAdmin')->only(['updatePostStatus']);
        $this->middleware('isAdmin');
    }
    public  function  index(){
        // $data=> parameer ,user role , status ,
      /*  $data['all']= Post::select('posts.*','users.first_name','users.last_name','users.image as profile_image')
            ->leftjoin('users','posts.author_id','=','users.id');

        $data['all']->when(Auth::user()->user_role==2 || Auth::user()->user_role==3, function ($q, $role) {
            return $q->where('author_id', Auth::user()->id);
        });*/
        $data['all']= getPosts('all',Auth::user()->user_role,false);
        $data['published']= getPosts('published',Auth::user()->user_role,APPROVED);
        $data['drafts']= getPosts('drafts',Auth::user()->user_role,DRAFT);
        $data['waiting_approval']= getPosts('drafts',Auth::user()->user_role,WAITING_APPROVAL);
        $data['archived']= getPosts('drafts',Auth::user()->user_role,ARCHIVED);
        /*
        $data['drafts']= Post::select('posts.*','users.first_name','users.last_name','users.image as profile_image')
            ->leftjoin('users','posts.author_id','=','users.id')->where('posts.status',DRAFT)->get();
        $data['waiting_approval']= Post::select('posts.*','users.first_name','users.last_name','users.image as profile_image')
            ->leftjoin('users','posts.author_id','=','users.id')->where('posts.status',WAITING_APPROVAL)->get();
        $data['archived']= Post::select('posts.*','users.first_name','users.last_name','users.image as profile_image')
            ->leftjoin('users','posts.author_id','=','users.id')->where('posts.status',ARCHIVED)->get();*/
       $data['heading']='Posts';
       $data['sub_heading']='View, review and create new posts';
       return view('admin.posts.index',$data);
    }
    public  function  create(){
        $data['post_types']= PostType::all();
        $data['heading']='Create Post ';
        $data['sub_heading']='Please provide  following details to create post';
        return view('admin.posts.create',$data);
    }
    public  function  store(Request $request){
        $data = $request->validate([
            'title'             => ['required', 'string'],
            'description'       =>  'required',
            'short_description'       =>  'required',
            'type'              =>  'required',
            'tags'              =>  'required'
        ]);
        $request->validate([
            'image'        =>   'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName='';
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/posts'), $imageName);
        }
       // $status = Auth::user()->user_role==1? APPROVED : DRAFT;
        $post_id=Post::insertGetId($data+['image'=>$imageName,'author_id'=>Auth::user()->id,'status'=>DRAFT]);
        if($request->hasfile('images')){
            foreach($request->file('images') as $image) {
                $imageName = rand(1111111111,9999999999).'.'.$image->extension();
                $image->move(public_path().'/uploads/posts/', $imageName);
                DB::table('attachments')->insert(['ref_id'=> $post_id,'link'=> $imageName,'type'=>'post']);
            }
        }
        return redirect()->route('view-post', ['id'=>$post_id])->with('Success','Post is in Drafts , Please review and approve');
    }
    public  function getPostsByStatus(Request $request){
        $posts = Post::where('posts.status',$request['status'])
                            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
                            ->select('posts.*','users.first_name','users.last_name','users.image')->get();

        return $posts;

    }
    public  function  view(Request $request){
        $data['heading']  ='Post Preview';
        $data['sub_heading']  ='Your Post is in Draft Mode, Please preveiw and post ';
        $data['post_types']= PostType::all();
        $data['post']=Post::where('post_id',$request['id'])->first();
        $data['post_attachments']= DB::table('attachments')->where('ref_id',$request['id'])->where('type','post')->get();

        return view('admin.posts.view',$data);
    }
    public  function  edit(Request $request){
       $data['heading']  =$request['action']."Post";
       $data['sub_heading']  ='';
       $data['post_types']= PostType::all();
       $data['post_attachments']= DB::table('attachments')->where('ref_id',$request['post_id'])->get();
       $data['post']=Post::where('post_id',$request['post_id'])->first();
       return view('admin.posts.edit',$data);
    }
    public  function  update(Request $request){
        if($request->input('action')){
            if(Post::whereIn('post_id', json_decode($request->input('data')))->update(['status'=>$request->input('action')])) {
                return ['success' => 1];
            }
            else{
                return ['error' => 1];
            }
        }
        $post_id= $request->input('post_id');
        $data = $request->validate([
            'title'             => ['required', 'string'],
            'description'       =>  'required',
            'short_description'       =>  'required',
            'type'              =>  'required',
        ]);
        $imageName='';
        if($request->hasFile('image')){
            $validated = $request->validate([
                'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads/posts'), $imageName);
            Post::where('post_id',$post_id)->update(['image'=>$imageName]);
        }
        Post::where('post_id',$post_id)->update($data);
        if($request->hasfile('images')){
            foreach($request->file('images') as $image) {
                $imageName = rand(1111111111,9999999999).'.'.$image->extension();
                $image->move(public_path().'/uploads/posts/', $imageName);
                $images[] = array(
                    'ref_id'                 => $post_id,
                    'link'                   => $imageName,
                    'type'                  => 'post'
                );
            }
            DB::table('attachments')->insert($images);
        }
        return redirect()->back()->with('Success','You have created a new post');
    }
    public  function  delete(Request $request){
        Post::where('post_id',$request['post_id'])->delete();
        return redirect()->back()->with('success','Post  has been deleted ');
    }
    public function deletePostAttachment($id){
        DB::table('attachments')->where('attachment_id',$id)->delete();
        return [
            'success' => 1
        ];

    }
    public  function  updatePostStatus(Request  $request){
       $status = Auth::user()->user_role==1? WAITING_APPROVAL : DRAFT;
       Post::where('post_id', $request['post_id'])
            ->update(['status' => $request['status']]);
       return redirect()->route('list-posts')->with('message','Post status has been updated ');
    }

}
