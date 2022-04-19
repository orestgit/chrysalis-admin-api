<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meetings;
use App\Models\MeetingAssign;
use App\Models\User;
use App\Models\MeetingPackages;
use App\Models\Duration;
use App\Models\UserDurations;
use Carbon;   
use App\Http\Traits\ZoomJWT;

class MeetingController extends Controller
{
    
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function store(Request $request){
       $date=\Carbon\Carbon::createFromFormat('Y-m-d',$request->date)->toDateString();
       
        $meeting=new Meetings();
        $meeting->user_id=$request->user_id;
        $meeting->subject=$request->subject;
        $meeting->date=$request->date;
        $meeting->addition_note=$request->addition_note;
        $meeting->meeting_duration=$request->meeting_duration;
        $meeting->save();
        $durations=$request->durations;
         
        foreach($durations as $duration){
        $duration=Duration::where('id',$duration)->first();
        $start_time=$duration->start_time;
       $end_time=$duration->end_time;
    //    return $start_time;
            $user_duration=new UserDurations();
            $user_duration->start_time=$date.' '.$start_time;
            $user_duration->end_time=$date.' '.$end_time;
            $user_duration->user_id=$request->user_id;
            $user_duration->meeting_id=$meeting['id'];
            $user_duration->save();
        }
        return response()->json([
            'message'=>'Your Meeting Request hass been added you wil reciceive meeting link after approval',
            'status'=>200
        ], 
        200);

    }
    public function MyMeetings(Request $request){
        $meetings=Meetings::where('user_id',$request->user_id)->get();
        foreach($meetings as $meeting){
            $meetingassign=MeetingAssign::where('meeting_id',$meeting->meeting_id )->first();
            if($meetingassign!=null){
                $meeting->host=User::leftjoin('user_bio','user_bio.user_id','=','users.id')
                ->select('users.id as id','users.first_name','users.last_name','users.image','user_bio.about','user_bio.facebook','user_bio.twitter','user_bio.instagram','user_bio.linkedin','user_bio.city','user_bio.country')
                ->where('users.id',$meetingassign->host_id)
                ->get();
                $meeting->host[0]['education']=User::leftjoin('user_education','user_education.user_id','=','users.id')
                ->select('user_education.education_id  as id','user_education.year','user_education.details')
                ->where('users.id',$meetingassign->host_id)
                ->get();
            }
        }
        return response()->json([
            'message'=>'Your Meeting details are below',
            'data'=>[
                'meetings'=>$meetings,
            ],
            'status'=>200
        ], 
        200);
    }
    public function endMeeting(Request $request){
        // return $request->all();
            $meeting_id=$request->meeting_id;
             $this->update($meeting_id,$request->all());
            $meeting=Meetings::where('meetingid',$meeting_id)->update(['status'=>2]);
            return response()->json([
                'message'=>'Your Meeting  has been ended',
               
                'status'=>200
            ], 
            200);
    }
    public function MeetingPackages(Request $request){
        $MeetingPackages=MeetingPackages::get();
        $duration=Duration::get();
        return response()->json([
            'message'=>'Your Meeting  has been ended',
            'data'=>[
                'MeetingPackages'=>$MeetingPackages,
                'durations'=>$duration,
            ],
            'status'=>200
        ], 
        200);
    }
}
