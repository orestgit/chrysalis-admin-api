<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserBio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){    
        return view('user.dashboard');
    }

    public  function settings(){
        $data['title'] = 'Profile Settings';
        $data['heading'] ="Settings";
        $data['sub_heading'] ="";
        $data['education']=UserEducation::where('user_id',Auth::user()->id)->get();
        $user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($user_bio==null){
            $user_bio['about']=null;
            $user_bio['facebook']=null;
            $user_bio['twitter']=null;
            $user_bio['instagram']=null;
            $user_bio['linkedin']=null;
            $user_bio['country']=null;
            $user_bio['city']=null;
        }
        $data['user_bio']=$user_bio;
        // return $data;
        
        return view('user.settings',$data);
    }
    public  function updateProfile(Request $request){
        // return $request->all();
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
               return redirect()->back()->with('error','Password and confirm password donot match');
           }
           User::where('id', $request->input('id'))
               ->update(['password' => Hash::make($request->input('new_password'))]);
       }
       if($imageName!==''){
           User::where('id', $request->input('id'))
               ->update($data+['image' => $imageName]);
       }
       if($request->has('year') && $request->has('degreetitle')){
           
           $degreetitle=$request->degreetitle;
           $year=$request->year;
        $i=0;
        foreach ($year as $education) {
           $user_education=new UserEducation();
           $user_education->year=$education;
           $user_education->details=$degreetitle[$i];
           $user_education->user_id=Auth::user()->id;
           $user_education->save();

           $i++;
        }
       }
       if($request->has('old_year') && $request->has('old_degreetitle')){
           
        $degreetitle=$request->old_degreetitle;
        $year=$request->old_year;
        $education_id=$request->id;
     $i=0;
     foreach ($year as $education) {
        $user_education=UserEducation::where('education_id',$education_id[$i])
        ->update([
        'year'=>$education,
        'details'=>$degreetitle[$i],
        'user_id'=>Auth::user()->id,
     ]);
        $i++;
     }
    }
    if($request->has('facebook')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
        $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['facebook'=>$request->facebook]);
            }
            else{
                $user_bio=new UserBio();
                $user_bio->facebook=$request->facebook;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
    if($request->has('linkedin')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
        $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['linkedin'=>$request->linkedin]);
            }
            else{
                $user_bio=new UserBio();
                $user_bio->linkedin=$request->linkedin;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }   
 
    }
    if($request->has('instagram')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
        $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['instagram'=>$request->instagram]);
            }
            else{
                $user_bio=new UserBio();
                $user_bio->instagram=$request->instagram;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
    if($request->has('twitter')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
        $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['twitter'=>$request->twitter]);
            }
            else{
                $user_bio=new UserBio();
                $user_bio->instagram=$request->instagram;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
    if($request->has('country')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
            $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['country'=>$request->country]);
        }
            else{
                $user_bio=new UserBio();
                $user_bio->country=$request->country;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
    if($request->has('city')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
            $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['city'=>$request->city]);
        }
            else{
                $user_bio=new UserBio();
                $user_bio->city=$request->city;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
    if($request->has('about')){
        $check_user_bio=UserBio::where('user_id',Auth::user()->id)->first();
        if($check_user_bio!=null){
            $user_bio=UserBio::where('user_id',Auth::user()->id)->update(['about'=>$request->about]);
        }
            else{
                $user_bio=new UserBio();
                $user_bio->about=$request->about;
                $user_bio->user_id=Auth::user()->id;
                $user_bio->save();

            }
    }
       else{

           User::where('id', $request->input('id'))
               ->update($data);
       }

       return  redirect()->back()->with('success', 'You  have udpated profile successfully');

   }

   public function deleteEducation(Request $request){
    UserEducation::where('education_id',$request['id'])->delete();
    return redirect()->back()->with('success','You have deleted the Education ');
   }
}
