<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class UserPostController extends Controller
{
    public function index(){
        $data['title'] = 'Profile Settings';
        $data['heading'] ="Settings";
        $data['sub_heading'] ="";
        $data['education']=UserEducation::where('user_id',Auth::user()->id)->get();
    }
}
