<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserBio;
use App\Models\UserEducation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
     public  function  login(){
         if(Auth::check()){
             return  redirect()->route('admin-dashboard');
         }
        // User::insert(['first_name'=>'Admin','last_name'=>'Name','email'=>'admin@mailinator.com', 'password'=>Hash::make('1234567890'),'user_role'=> 1]);
         return view('admin.login');
     }
     public  function  deleteEducation(Request $request){
         UserEducation::where('education_id',$request['id'])->where('user_id',Auth::user()->id)->delete();
     }
     public  function updateProfile(Request $request){
         $current_education= UserEducation::where('user_id',Auth::user()->id)->get();
          $data=$request->validate([
             'first_name'        => ['required', 'string'],
             'last_name'          =>  'required',
             'phone'             =>  'required',
         ]);
         $imageName='';
         if($request->hasFile('image')){
             $validated = $request->validate([
                 'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
             ]);
             $imageName = time().'.'.$request->image->extension();
             $request->image->move(public_path('uploads/users'), $imageName);
         }
         if($request->input('new_password')){
             if(!Hash::check($request->input('current_password'),Auth::user()->getAuthPassword())){
                 return redirect()->back()->with('error','Your current password is not correct');
             }
             if($request->input('new_password')!==$request->input('confirm_password')){
                 return redirect()->back()->with('error','Password and confirm password do not match');
             }
             User::where('id', $request->input('id'))
                 ->update(['password' => Hash::make($request->input('new_password'))]);
         }
         if($imageName!==''){
             User::where('id', $request->input('id'))
                 ->update($data+['image' => $imageName]);
         }
         else{

             User::where('id', $request->input('id'))
                 ->update($data);
         }
         if($request->input('country') && $request->input('country')!=''){
             $country= DB::table('countries')->where('id',$request->country);
         }
         else{
             $country='';
         }

         $country= $request->input('countries') && $request->input('countries')!='' ? DB::table('countries')->select('name')->where('id',$request->input('countries'))->first()->name:'';
         $state = $request->input('states') && $request->input('states') != null ? DB::table('states')->select('name')->where('id', $request->input('states'))->first()->name : '';
         $city = $request->input('cities') && $request->input('cities') != '' ? DB::table('cities')->select('name')->where('id', $request->input('cities'))->first()->name : '';

         UserBio::where('user_id',Auth::user()->id)->count()>0 ?
             UserBio::where('user_id',Auth::user()->id)->update([  'facebook' => $request->input('facebook'),
                 'linkedin' => $request->input('linkedin'),
                 'twitter' => $request->input('twitter'),
                 'instagram' => $request->input('instagram'),
                 'about'    => $request->input('about'),
                 'country' =>  $country,
                 'state'   =>  $state,
                 'city'    => $city]):
             UserBio::insert([  'facebook' => $request->input('facebook'),
                         'linkedin' => $request->input('linkedin'),
                         'twitter' => $request->input('twitter'),
                         'instagram' => $request->input('instagram'),
                         'about'    => $request->input('about'),
                         'country' =>  $country,
                         'state'   =>  $state,
                         'city'    => $city,'user_id'=>Auth::user()->id]);
         if($request->has('ids') && !empty($request->input('ids'))){
             $ids = explode(',', $request->input('ids'));
             foreach ($ids as $id){

                 UserEducation::insert([
                     'user_id'    => Auth::user()->id,
                     'year'       => date($request->input('year_'.$id)),
                     'details'    => $request->input('details_'.$id),
                 ]);
             }
         }
         if(count($current_education)>0){
             foreach ($current_education as $education){
                  UserEducation::where('education_id',$education->education_id)->where('user_id',Auth::user()->id)
                     ->update([
                         'details' => $request->input('details_'.$education->education_id),
                         'year' =>$request->input('year_'.$education->education_id),
                     ]);
             }
         }
         return  redirect()->back()->with('success', 'You  have updated profile successfully');

     }
     public  function settings(){
         $data['title'] = 'Profile Settings';
         $data['heading'] ="Settings";
         $data['sub_heading'] ="";
         $data['countries']= DB::table('countries')->get();
         $data['cities']= DB::table('cities')->get();
         $data['states']= DB::table('states')->get();
         $data['user_bio']= UserBio::where('user_id',Auth::user()->id)->first();
         $data['user_education']= UserEducation::where('user_id',Auth::user()->id)->get();
         return view('admin.settings',$data);
     }
     public  function  logout(){
         Auth::logout();
         return redirect('admin-login');
     }
    function getStates(Request $request){

        $states = DB::table('states')->where('country_id', $request->country_id)->get();

        return([
            'states' => $states
        ]);
    }
    function getCities(Request $request){
        $cities = DB::table('cities')->where('state_id', $request->state_id)->get();
        return([
            'cities' => $cities
        ]);
    }
}
