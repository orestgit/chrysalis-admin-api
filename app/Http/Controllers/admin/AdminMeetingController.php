<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meetings;
use App\Models\User;
use App\Models\MeetingAssign;
use App\Models\UserDurations;
use App\Http\Traits\ZoomJWT;

use DB;
use Auth;
use GuzzleHttp\Client;

class AdminMeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function PendingMeetings(){
        $data['heading']= 'Pending Meeting';
        $data['meetings']=Meetings::where('status','=',0)->get();
        $data['sub_heading']='Following is the list of Pending Meetings';
        $data['title']= 'Manage Meetings';
        // return $data;
        return view('admin.Meetings.index',$data);
    }

    public function AssignedMeetings(){
        $data['heading']= 'Assigned Meeting';
        $data['meetings']=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',1)
        ->get();
        $data['sub_heading']='Following is the list of Assigned Meetings';
        $data['title']= 'Manage Meetings';
        // return $data;
        return view('admin.Meetings.assigned_meetings',$data);
    }

    public function CompletedMeetings(){
        $data['heading']= 'Completed Meeting';

        $data['meetings']=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',2)
        ->get();
        $data['sub_heading']='Following is the list of Completed Meetings';
        $data['title']= 'Manage Meetings';
        // return $data;
        return view('admin.Meetings.assigned_meetings',$data);
    }
    public function MeetingDetails(Request $request){

        $data['heading']= 'Meeting Details';
        $data['title']= 'Meeting Details';
        $data['sub_heading']='';
        $hostcheck=Meetings::where('meeting_id',$request['id'])->first();
        // return $hostcheck;
        if($hostcheck->host==null){
            $data['meeting']=Meetings::where('meeting_id',$request['id'])->first();
            $data['meeting']->first_name=null;
            $data['meeting']->last_name=null;
            $data['meeting']['time_slots']=UserDurations::where('meeting_id',$request['id'])->get();
        }
        else{

            $data['meeting']=Meetings::join('users','users.id','=','meetings.host')
            ->select('meetings.meeting_id','meetings.subject','meetings.host','meetings.date','meetings.status','meetings.start_time','meetings.end_time'
            ,'meetings.meeting_duration','meetings.zoom_meeting_id','meetings.meeting_link','meetings.meeting_password','users.first_name' ,'users.last_name')
            ->where('meetings.meeting_id','=',$request['id'])
            ->first();
        }
        $data['meeting']['hosts']=User::where('user_role',3)->get();
         return view('admin.Meetings.meeting_details',$data);
    }

    public function deleteMeeting(Request $request){
        $hostcheck=Meetings::where('meetingid',$request['id'])->delete();
        // return $hostcheck;
        return redirect()->back()->with('success','Meeting has been deleted ');

    }

    public function assignMeeting(Request $request){
        // return $request->all();
       $meeting=$this->create($request->all());
    //   return $meeting['data']['id'];
                    $hostcheck=Meetings::where('meeting_id',$request->id)->update([
                        'status'=>1,
                        'host'=>$request->host,
                        'meeting_link'=>$meeting['data']['join_url'],
                        'meeting_link_host'=>$meeting['data']['join_url'],
                        'zoom_meeting_id'=>$meeting['data']['id'],
                        'meeting_password'=>$meeting['data']['password'],
                        'start_time'=>$request->start_time,
                        'meeting_duration'=>$request->duration,
                        'end_time'=>$request->end_time,

                    ]);
                    $meeting_assign=new MeetingAssign();
                    $meeting_assign->meeting_id=$request->id;
                     $meeting_assign->host_id=$request->host;
                      $meeting_assign->save();
                      $userids_check=Meetings::where('meeting_id',$request->id)->first();
                    //   return $userids_check;
        $firebaseToken = User::where('id',$userids_check->user_id)->whereNotNull('device_key')->pluck('device_key')->all();
        //   return $firebaseToken;
        $SERVER_API_KEY = 'AAAA6WrnuMw:APA91bFHSO5Y_sfaI_i_77hft6S2k1Pc-WYTYK6BR0fEd1Gmit4sg4m9EnNpU-phIYdrrp5lyMdeGSOHIH046tMnRT-6KKhq2Od31MpZWeFmpUvkogw3P1Ur7Bm1xNCF_rkz1DCUqTm_';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
         $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // dd($response);
        // return $hostcheck;
        return redirect()->back()->with('success','Meeting has been scheduled');

    }

    // Functions Made
    public function Meetings(Request $request)
    {
        $data['heading']= 'Meetings';
        // $data['meetings']=Meetings::where('status','=',0)->get();
        $data['meetings']=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',1)
        ->get();
        // return $data['meetings'];
        // $data['test'] = Meetings::where('status',1)->get();
        //         return $data['test'];

        $data['counts'] = Meetings::where('status','1' )->count();
        // return $data['counts'];
        $data['sub_heading']='All Meetings';
        $data['title']= 'Meetings';

        $data['totalHours'] = Meetings::sum('meeting_duration');
        $data['ScheduleTime'] = Meetings::where('status','1')->sum('meeting_duration');
        $data['pendingTime'] = Meetings::where('status','0')->sum('meeting_duration');
        $data['completeTime'] = Meetings::where('status','2')->sum('meeting_duration');
        // return $completeTime;

          return view('admin.Meetings.meetings', $data);
    }

    public function meetingsList(Request $request, $date)
    {
        // return $date;
        $data['heading'] = 'Meetings List';
        // $data['meetings']=Meetings::where('status','=',0)->get();
        $data['sub_heading'] ='Meetings List';
        $data['title']= 'Meetings List';

        $data['meetings']=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',1)
        ->where('meetings.date','=',$date)
        ->get();

        $data['status0']=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',0)
        ->where('meetings.date','=',$date)
        ->get();
        // return $data['meetings'];
        $data['totalHours'] = Meetings::sum('meeting_duration');
        $data['ScheduleTime'] = Meetings::where('status','1')->sum('meeting_duration');
        $data['pendingTime'] = Meetings::where('status','0')->sum('meeting_duration');
        $data['completeTime'] = Meetings::where('status','2')->sum('meeting_duration');
        // return $completeTime;
        return view('admin.Meetings.meetings_list', $data);
    }
    public function allMeetingsList(Request $request)
    {
            $data['heading'] = 'All Meetings List';
             // $data['meetings']=Meetings::where('status','=',0)->get();
            $data['sub_heading'] ='All Meetings List';
            $data['title']= 'Meetings List';

            //For All
                 $data['all']=Meetings::join('users','users.id','=','meetings.host')
                ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status',
                    'meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
                ->get();

            //For scheduled

            $data['schedules']=Meetings::join('users','users.id','=','meetings.host')
            ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time',
                'meetings.end_time','users.first_name' ,'users.last_name','users.image')
            ->where('meetings.status','=',1)
            ->when(Auth::user()->user_role!=1,function ($query)  {
                    return $query->where('meetings.host_id', Auth::user()->id);
                })
            ->get();


            // For Pending
            $data['pendings']=Meetings::join('users','users.id','=','meetings.host')
            ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name','users.image')
            ->where('meetings.status','=',0)
            ->get();



            // FOr Canceld or Complete
            $data['complete']=Meetings::join('users','users.id','=','meetings.host')
            ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name','users.image')
            ->where('meetings.status','=',3)
            ->get();


            // For Graph Values

            $data['totalHours'] = Meetings::sum('meeting_duration');
            $data['ScheduleTime'] = Meetings::where('status','1')->sum('meeting_duration');
            $data['pendingTime'] = Meetings::where('status','0')->sum('meeting_duration');
            $data['completeTime'] = Meetings::where('status','2')->sum('meeting_duration');
            // return $completeTime;

            return view('admin.Meetings.all_meetings_list', $data);
    }

    public function calenderListing(Request $request)
    {
        $data = array();
       $meetings=Meetings::join('users','users.id','=','meetings.host')
        ->select('meetings.meeting_id','meetings.subject','meetings.date','meetings.status','meetings.start_time','meetings.end_time','users.first_name' ,'users.last_name')
        ->where('meetings.status','=',1)
        ->get();
        foreach ($meetings as $meeting) {
            if (!empty($row['start_time']) && !empty($row['end_time'])) {
                // $date  = new Date($row['date']);
            //   $date = date('d-m-Y', $row['date']);
              $startTime = date('H:i', $row['start_time']);
              $endTime = date('H:i', $row['end_time']);
              //print_r('start time:',$startTime);
              //print_r('end time:',$endTime);
              //print_r('date:',$date);die;
              $data[]  = array(
                'id'  =>  $row['meeting_id'],
                'title'  =>  $row['subject'],
                'start'  =>  date('d/M/Y H:i', strtotime("$date $startTime")),
                'end'  =>  date('d/M/Y H:i', strtotime("$date $endTime")),
                'backgroundColor'=> '#03C977',
                'color' => 'green',
                'description' => 'abcs',
                // 'allDay' => false,
                'url'  =>   base_url('meetings-list/' . encode($row['date']))
              );
            }
          }
          echo json_encode($data);


    }
}
