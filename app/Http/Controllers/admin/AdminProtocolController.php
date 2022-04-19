<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProtocolQuestion;
use Illuminate\Http\Request;
use App\Models\Protocol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\ProtocolQuiz;

class AdminProtocolController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }
    public  function index(){

        $data['heading']= 'Protocols';

        $data['protocols']=Protocol::all();
        $data['sub_heading']='Following is the list of Protocols';
        $data['title']= 'Manage Protocols';
        return view('admin.protocols.index',$data);
    }
    public function  create(){
        $data['heading']= 'Create Protocol';
        $data['title']= 'Create Protocol';
        $data['sub_heading']='';
        return view('admin.protocols.create',$data);

    }
    public  function  deleteProtocolAttachment($id){
        DB::table('attachments')->where('attachment_id',$id)->delete();
        return [
            'success' => 1
        ];
    }
    public  function update(Request  $request){
        $data = $request->validate([
            'title'             => ['required', 'string'],
            'content'       =>  'required'
        ]);
        if($request->hasfile('images')){
            foreach($request->file('images') as $image) {
                $imageName = rand(1111111111,9999999999).'.'.$image->extension();
                $image->move(public_path().'/uploads/protocols/', $imageName);
                $images[] = array(
                    'ref_id'                 => $request->input('protocol_id'),
                    'link'                   => $imageName,
                    'type'                   => 'protocol'
                );
            }
            DB::table('attachments')->insert($images);
        }
        Protocol::where('protocol_id',$request->input('protocol_id'))->update($data);
        return redirect()->back()->with('success','Protocol has been updated');
    }
    public  function  edit(Request $request){
        $data['heading']= 'Edit Protocol';
        $data['title']= 'Edit Protocol';
        $data['sub_heading']='';
        $data['protocol']=Protocol::where('protocol_id',$request['protocol_id'])->first();
        $data['protocol_attachments']  = DB::table('attachments')->where('ref_id',$request['protocol_id'])->where('type','protocol')->get();
        return view('admin.protocols.edit',$data);
    }
    public  function  store(Request $request){
        $data = $request->validate([
            'title'             => ['required', 'string','unique:protocols'],
            'content'       =>  'required'
        ]);
        $protocol_id=Protocol::insertGetId($data+['created_by'=>Auth::user()->id]);
        if($request->hasfile('images')){
            foreach($request->file('images') as $image) {
                $imageName = rand(1111111111,9999999999).'.'.$image->extension();
                $image->move(public_path().'/uploads/protocols/', $imageName);
                $images[] = array(
                    'ref_id'                 => $protocol_id,
                    'link'                   => $imageName,
                    'type'                   => 'protocol'
                );
            }
            DB::table('attachments')->insert($images);
        }
        return redirect(route('list-protocols'))->with('success','Protocol has been saved');
    }
    public  function delete(Request $request){
         Protocol::where('protocol_id',$request['protocol_id'])->delete();
         return redirect()->back()->with('success','You have deleted the protocol ');
    }

    public function attempts(Request $request){
        \DB::statement("SET SQL_MODE=''");
        $data['protocols']=DB::table('protocol_quizzes')
            ->leftjoin('users','users.id','=','protocol_quizzes.user_id')
            ->leftjoin('protocols','protocols.protocol_id','=','protocol_quizzes.quiz_id')
        ->select('protocol_quizzes.protocol_quizze_id','users.id as user_id','users.first_name','users.last_name','protocol_quizzes.created_at as attempt_date',
        'protocols.title as protocol_name','protocol_quizzes.submission_id')
            ->where('protocol_quizzes.quiz_id',$request->protocol_id)
            ->groupby('protocol_quizzes.submission_id')
            ->get();
        $data['protocol_id']= $request->protocol_id;

        $data['heading']= 'Submitted Protocol';
        $data['title']= 'Listing of Submissions for the protocol';
        $data['sub_heading']='';
        return view('admin.protocols.attempts',$data);
    }

    public function protocolSubmissionDetails(Request $request){

        // return $request->all();
        $data['protocol']=Protocol::where('protocol_id',$request['protocol_id'])->first();

        $data['submitted_protocol']=DB::table('protocol_quizzes')->where('submission_id',$request['submission_id'])->get();
        $data['user_details']=User::where('id',$request['user_id'])->first();
        $data['protocol_questions']= ProtocolQuestion::where('protocol_id',$request['protocol_id'])->get();
        foreach ($data['protocol_questions'] as $question){
            $question->options= DB::table('protocol_question_options')
                ->select('protocol_question_options.option_id','protocol_question_options.option',
                    'protocol_question_options.is_correct','protocol_quizzes.option_id as answer')
                ->leftjoin('protocol_quizzes','protocol_question_options.option_id','=','protocol_quizzes.option_id')
                ->where('protocol_question_options.question_id',$question->question_id)->get();
        }
        $data['heading']= 'Submitted  Protocol Details';
        $data['title']= 'Submitted  Protocol Details';
        $data['sub_heading']='Following are the details for protocols submission';
        return view('admin.protocols.attempt_details',$data);

    }
    public function deleteProtocolQuestion(Request $request){
         return ProtocolQuestion::where('question_id',$request['question_id'])->delete() ==true? ['success' => 1] :['error' => 1];

    }
}
