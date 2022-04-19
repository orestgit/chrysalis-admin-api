<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Meetings;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
   public  function  index(){
       $data['heading']='';
       $data['sub_heading']='';
      $data['totalHours'] = Meetings::sum('meeting_duration');
      $data['ScheduleTime'] = Meetings::where('status','1')->sum('meeting_duration');
      $data['pendingTime'] = Meetings::where('status','0')->sum('meeting_duration');
      $data['completeTime'] = Meetings::where('status','2')->sum('meeting_duration');
      // return $completeTime;
        return view('admin.dashboard', $data);
   }

}
