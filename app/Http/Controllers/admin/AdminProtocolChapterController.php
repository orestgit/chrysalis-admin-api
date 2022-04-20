<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProtocolChapter;
use App\Models\ProtocolQuestion;
use Illuminate\Http\Request;

class AdminProtocolChapterController extends Controller
{
   public  function create(){
       $data['heading']='Protocol Chapter';
       $data['sub_heading']='View and create protocol chapters';
       return view('admin.protocol_chapters.create',$data);
   }
   public  function  delete(Request $request){
        ProtocolChapter::where('chapter_id',$request['chapter-id'])->delete();
        return redirect()->back()->with('success','You have deleted the protocol chapter ');
   }
   public  function  index(){
       $data['chapters']= ProtocolChapter::all();
       $data['heading']='Protocol Chapter';
       $data['sub_heading']='View and create protocol chapters';
       return view('admin.protocol_chapters.index',$data);
   }
   public  function  store(Request $request){
         $chapter_id=ProtocolChapter::insertGetId([
            'label' => $request->input('label'),
            'question' => $request->input('question'),
            'description_one' => $request->input('description_one'),
            'description_two' => $request->input('description_two'),
            'yes_option_text' => $request->input('yes_option_text'),
            'no_option' => $request->input('no_option_text'),
        ]);
       if($request->has('ids') && !empty($request->input('ids'))){
           $ids = explode(',', $request->input('ids'));
           foreach ($ids as $id){
               ProtocolQuestion::insert([
                   'chapter_id'    => $chapter_id,
                   'type'    => 1,
                   'question_type'    => 'chapter',
                   'question'    => $request->input('question_'.$id),
               ]);

           }
       }
    return redirect(route('list-protocol-chapters'))->with('success','You have added protocol chapter ');
   }
   public  function  updateChapter(Request $request){

       ProtocolChapter::where('chapter_id', $request['chapter_id'])->update([
                   'label' => $request->input('label'),
                   'question' => $request->input('question'),
                   'description_one' => $request->input('description_one'),
                   'description_two' => $request->input('description_two'),
                   'yes_option_text' => $request->input('yes_option_text'),
                    'no_option' => $request->input('no_option'),
                    'skip_option' => $request->input('skip_option'),
               ]);
       $questions_to_udpate = ProtocolQuestion::select('question_id')->where('chapter_id', $request['chapter_id'])->where('question_type','chapter')->get();
       if(sizeof($questions_to_udpate)>0){
           foreach ($questions_to_udpate as $question){

               ProtocolQuestion::where('question_id',$question['question_id'])->update([
                   'question'   => $request->input('question_'.$question['question_id']),
               ]);
           }
       }

       if($request->has('ids') && !empty($request->input('ids'))){
           $ids = explode(',', $request->input('ids'));
           foreach ($ids as $id){
               ProtocolQuestion::insert([
                   'chapter_id'    => $request['chapter_id'],
                   'type'    => 1,
                   'question_type'    => 'chapter',
                   'question'    => $request->input('question_'.$id),
               ]);

           }
       }

       return redirect()->back();


   }
   public  function  edit(Request $request){

       $data['heading']='Edit Protocol Chapter';
       $data['sub_heading']='View and Update protocol chapter';
       $data['protocol_chapter']=ProtocolChapter::where('chapter_id',$request['chapter_id'])->first();
       $data['all_chapters']= ProtocolChapter::where('chapter_id','!=',$request['chapter_id'])->get();
       $data['protocol_questions']=ProtocolQuestion::where('chapter_id',$request['chapter_id'])->where('question_type','chapter')->get();
       return view('admin.protocol_chapters.edit',$data);
   }
   public  function  deleteChapterQuestion(Request $request){
       ProtocolQuestion::where('question_id',$request['question_id'])->delete();
   }
}
