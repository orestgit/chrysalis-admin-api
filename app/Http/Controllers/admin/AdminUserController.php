<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\WalletPayments;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInvitations;
use  Mail;
use Hash;
use App\Mail\AccountCreated;
use App\Models\UserBio;
use PhpParser\Node\Stmt\DeclareDeclare;
use Db;
use Str;
use App\Jobs\SendAccountCreationEmail;
class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function  index(){
        $data['users']= User::all()->except(Auth::user()->id);
        $data['heading']='Users Listing';
        $data['sub_heading']='Following is the list of users ';
        return view('admin.users.index',$data);
    }
    public  function  store(Request $request){
        $validated = $request->validate([
            'email'             => ['required', 'string', 'unique:users'],
            'user_role'         => 'required',
            'message'           => 'required'
        ]);
        $password= Str::random(8);
        $userid= User::insertGetId(['email'=>$request->input('email'),'user_role'=>$request->input(['user_role']),'password'=>Hash::make($password)]);
        ///UserInvitations::insert(['user_id'=> $userid,'message' => $request->input('message')]);
        $data = array(
            "password" => $password,
            'msg'=>$request->input('message'),
            "user_email"=>$request->input('email')
        );
        dispatch(new SendAccountCreationEmail($data));
        /*Mail::to($request->email)->send(new AccountCreated($data));*/

        return redirect('admin/list-users')->with('success','User has been created ');
    }
    public  function  userProfile(Request $request){

        $data['heading']='Users Profile';
        $data['sub_heading']='Following is the detail for profile';
        $data['title']= 'User Profile Screen';
        $data['posts']= User::find($request['user_id'])->userPosts;
        $data['user_bio']=User::find($request['user_id'])->userBio;
        $data['user_education']=User::find($request['user_id'])->userEducation;
        $data['user']= User::where('id',$request['user_id'])->get()[0];
        $data['token_purchases']= WalletPayments::where('user_id',$request['user_id'])->get();
        return view('admin.users.profile',$data);
    }
    public  function  block(Request $request){
        User::where('id', $request['user_id'])
                ->update(['status' => 0]);
        return redirect()->back()->with('error','User has been blocked');
    }
    public  function  unblock(Request $request){
        User::where('id', $request['user_id'])
            ->update(['status' => 1]);
        return redirect()->back()->with('success','User has been unblocked');
    }


}
