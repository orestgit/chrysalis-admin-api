<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Likes;
use App\Models\PostType;
use App\Models\PostView;
use DB;
use Validator;
/**
 * @group Post Apis
 *
 * APIs for managing posts
 */
class PostController extends Controller
{
     /**
  
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "posts and categories bellow",
    "data": {
        "types": [
            {
                "post_type_id": 5,
                "name": "post type here",
                "created_at": "2021-10-22T19:26:29.000000Z",
                "updated_at": "2021-11-01T12:24:39.000000Z",
                "deleted_at": null
            }
        ],
        "post": [
            {
                "post_id": 7,
                "title": "Delectus nulla ipsa",
                "description": "Id exercitationem la",
                "type": 5,
                "image": "1636622132.png",
                "status": 1,
                "tags": "Tenetur voluptatem s",
                "views": 0,
                "likes": 0,
                "created_at": "2021-11-11T10:15:32.000000Z"
            }
        ]
    },
    "status": 200
}

   */
    public function viewPost(Request $request){
        // return $request->all();
        $type=PostType::select('post_type_id','name','label_color','label_background_color','lable_text_color')->get();

        if($request->has('popular') && $request->has('type') && $request->has('title')){
       $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')             
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.title','like',"%$request->title%")
            ->where('posts.type',$request->type)
            ->orderBy('posts.likes','desc')
            ->paginate('5');

        }
         
        elseif($request->has('older') && $request->has('type') && $request->has('title')){
            
            $post=Post::join('users','users.id','=','posts.author_id')
              ->join('post_types','posts.type','=','post_types.post_type_id')            
              ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
             ->where('users.status','=',1)
             ->where('posts.title','like',"%$request->title%")
             ->where('posts.type',$request->type)
             ->orderBy('posts.created_at')
             ->paginate('5');
 
         }
         elseif($request->has('latest') && $request->has('type') && $request->has('title')){
             $post=Post::join('users','users.id','=','posts.author_id')
              ->join('post_types','posts.type','=','post_types.post_type_id')
              ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')            ->where('users.status','=',1)
              ->where('posts.title','like',"%$request->title%")
              ->where('posts.type',$request->type)
              ->orderBy('posts.created_at','desc')
              ->paginate('5');
  
          }
        
        elseif($request->has('popular') && $request->has('title')){
            $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')          
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('title','like',"%$request->title%")
            ->orderBy('posts.likes','desc')
            ->paginate('5');

        }
        
        elseif($request->has('older') && $request->has('title')){
            $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')           
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.title','like',"%$request->title%")
            ->orderBy('posts.created_at')
            ->paginate('5');

        }
        elseif($request->has('popular') && $request->has('type')){
          $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')             
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.type',$request->type)
            ->orderBy('posts.likes','desc')
            ->paginate('5');

        }
        elseif($request->has('older') && $request->has('type')){
            $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')            
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.type',$request->type)
            ->orderBy('posts.created_at')
            ->paginate('5');

        }
       
        
        elseif($request->has('latest') && $request->has('type')){
            $post=Post::join('users','users.id','=','posts.author_id')

            ->join('post_types','posts.type','=','post_types.post_type_id')
            ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')            ->where('users.status','=',1)
            ->where('posts.type',$request->type)
            ->orderBy('posts.created_at','desc')
            ->paginate('5');

        }
        elseif( $request->has('title')){
            $post=Post::join('users','users.id','=','posts.author_id')
            
            ->join('post_types','posts.type','=','post_types.post_type_id')
            ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.title','like',"%$request->title%")
            ->orderBy('posts.created_at','desc')
            ->paginate('5');
        }
        elseif($request->has('older')){
            $post=Post::join('users','users.id','=','posts.author_id')
              ->join('post_types','posts.type','=','post_types.post_type_id')          
              ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
             ->where('users.status','=',1)
             ->orderBy('posts.created_at')
             ->paginate('5');
 
         }
         elseif($request->has('popular')){
             
             $post=Post::join('users','users.id','=','posts.author_id')
                  ->join('post_types','posts.type','=','post_types.post_type_id')           
                  ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','post_types.name as post_title','posts.type','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
             ->where('users.status','=',1)
             ->orderBy('posts.likes', 'desc')
             ->paginate('5');
 
         }
         elseif($request->has('type')){
            $post=Post::join('users','users.id','=','posts.author_id')
             ->join('post_types','posts.type','=','post_types.post_type_id')            
             ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->where('posts.type',$request->type)
            ->paginate('5');

        }
        else{
            
            $post=Post::join('users','users.id','=','posts.author_id')
            ->join('post_types','posts.type','=','post_types.post_type_id')
            ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','posts.type','post_types.name as post_title','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')
            ->where('users.status','=',1)
            ->orderBy('posts.created_at','desc')

                    ->paginate('5');
        }
        foreach($post as $posts){
            $check_liked=Likes::where('post_id',$posts->post_id)->where('user_id',$request->user_id)->first();
            if($check_liked==null){
                $posts->isliked=false;
            }
            else{
                $posts->isliked=true;
            }
            
            $check_viewed=PostView::where('post_id',$posts->post_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $posts->isViewed=false;
            }
            else{
                $posts->isViewed=true;
            }
           
        }
        return response()->json([
            'message'=>'posts and categories bellow',
            'data'=>[
                'post_categories'=>$type,
                'posts'=>$post
            ],
                'status'=>200
        ], 
        200);
    }

     /**
     * @bodyParam post_id in required The id of the post. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "post details is below",
    "data": {
        "post": [
            {
                "id": 7,
                "author_id": 1,
                "title": "Delectus nulla ipsa",
                "description": "Id exercitationem la",
                "image": "1636622132.png",
                "likes": 0,
                "views": 0,
                "tags": "Tenetur voluptatem s",
                "name": "post type here",
                "images": [
                    {
                        "link": "3102076750.jpg"
                    },
                    {
                        "link": "3217966126.png"
                    },
                    {
                        "link": "3908092552.jpg"
                    },
                    {
                        "link": "6811210134.png"
                    }
                ],
                "user": {
                    "0": {
                        "id": 1,
                        "first_name": "Admin",
                        "last_name": "Name",
                        "image": "1635162482.png",
                        "about": null,
                        "facebook": null,
                        "twitter": null,
                        "instagram": null,
                        "linkedin": null
                    },
                    "education": [
                        {
                            "id": 3,
                            "year": "2021-10-23",
                            "details": "some details here "
                        },
                        {
                            "id": 4,
                            "year": "2021-10-23",
                            "details": "some details here "
                        }
                    ],
                    "related_posts": []
                }
            }
        ]
    },
    "status": 200
}

      * @response status=400 scenario="post_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The post id field is required.",
    "status": 400
}



   */
    public function postDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        $post=Post::join('post_types','post_types.post_type_id','=','posts.type')
            ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','post_types.name as type','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')        ->where('posts.post_id',$request->post_id)
        ->first();
        $post->images=DB::table('attachments')->where('ref_id',$request->post_id)->select('link')->get();
        
        $post->author=User::leftjoin('user_bio','user_bio.user_id','=','users.id')
        ->select('users.id as id','users.first_name','users.last_name','users.image','user_bio.about','user_bio.facebook','user_bio.twitter','user_bio.instagram','user_bio.linkedin','user_bio.city','user_bio.country')
        ->where('users.id',$post->author_id)
        ->get();
        $post->author[0]['education']=User::leftjoin('user_education','user_education.user_id','=','users.id')
        ->select('user_education.education_id  as id','user_education.year','user_education.details')
        ->where('users.id',$post->author_id)
        ->get();
        // return $post;
        $related_posts=Post::join('post_types','post_types.post_type_id','=','posts.type')
        ->select('posts.post_id','posts.title','posts.author_id','posts.description','posts.short_description','post_types.name as type','posts.image','posts.status','posts.tags','posts.views','posts.likes','posts.created_at','post_types.label_color','post_types.label_background_color','post_types.lable_text_color')        
        -> where('posts.status',1)
        ->where('posts.author_id',$post->author_id)
        ->where('posts.post_id','<>',$request->post_id)
        ->get();
          foreach($related_posts as $related_post){
            $check_liked=Likes::where('post_id',$related_post->post_id)->where('user_id',$request->user_id)->first();
            if($check_liked==null){
                $related_post->isliked=false;
            }
            else{
                $related_post->isliked=true;
            }
            
            $check_viewed=PostView::where('post_id',$related_post->post_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $related_post->isViewed=false;
            }
            else{
                $related_post->isViewed=true;
            }
           
        }
        $post->author[0]['related_posts']=$related_posts;
            $check_liked=Likes::where('post_id',$request->post_id)->where('user_id',$request->user_id)->first();
            
            if($check_liked==null){
                $post->isliked=false;
            }
            else{
                $post->isliked=true;
            }
            $post_view=PostView::where('post_id',$request->post_id)->where('user_id',$request->user_id)->get();
            $count=count($post_view); 
            // return $count;
            if($count==0){
                $post_view_save= new PostView();
                $post_view_save->post_id=$request->post_id;
                $post_view_save->user_id=$request->user_id;
                $post_view_save->save();
                $count1=PostView::where('post_id',$request->post_id)->count();
                $count2=$count1;
                 $post_view_count=Post::where('post_id',$request->post_id)->update([
                'views'=>$count2
            ]);        
            
            $post->views=$count2;
                
            }
            else{
                  $count1=PostView::where('post_id',$request->post_id)->count();
                $coun2t=$count1+1;
                 $post_view_count=Post::where('post_id',$request->post_id)->value('views');
                 $post->views=$post_view_count;
            }
            
            
            $check_viewed=PostView::where('post_id',$request->post_id)->where('user_id',$request->user_id)->first();
            if($check_viewed==null){
                $post->isViewed=false;
            }
            else{
                $post->isViewed=true;
            }
        return response()->json([
            'message'=>'post details is below',
            'data'=>[
                'post'=>$post
            ],
                'status'=>200
        ], 
        200);
    }
 /**
     * @bodyParam user_id integer required The first_name of the user. 
     * @bodyParam post_id integer required The last_name of the user. 
     * @bodyParam secret string  required 

       * @response status=200 scenario="like " 
     *{
    "message": "you have been liked post",
    "status": 200
}
  * @response status=200 scenario="dislike " 
     *{
    "message": "you have been disliked post",
    "status": 200
}

      * @response status=400 scenario="user_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The user id field is required.",
    "status": 400
}
  * @response status=400 scenario="post_id validation" 
     *{
    "message": "Please fix the following error to continue",
    "errors": "The post id field is required.",
    "status": 400
}


   */
    public function likePost(Request $request){
         $validator = Validator::make($request->all(), [ 
            'user_id' => 'required',
            'post_id' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
                ], 
                400);  
        }
        $like_check=Likes::where('post_id',$request->post_id)->where('user_id',$request->user_id)->get();
        $count=count($like_check);
    //   return $count;
        if($count==0){
            $check=new Likes();
            $check->user_id=$request->user_id;
            $check->post_id=$request->post_id;
            $check->save();
            $like_check=Likes::where('post_id',$request->post_id)->get();
            $count=count($like_check);
            $post=Post::where('post_id',$check->post_id)->update([
                'likes'=>$count
            ]);
            return response()->json([
                'message'=>'you have  liked post',
            
                    'status'=>200
            ], 
            200);
        }
        else{
            $like_check=Likes::where('post_id',$request->post_id)->where('user_id',$request->user_id)->delete();
            $like_check=Likes::where('post_id',$request->post_id)->get();
            $count=count($like_check);
            // return $count;
            $post=Post::where('post_id',$request->post_id)->update([
                'likes'=>$count
            ]);
            return response()->json([
            'message'=>'you have been disliked post',
            'status'=>200,
            ], 
            200);
        }
 
    }
 /**
     * @bodyParam title string required The first_name of the user. 
     * @bodyParam secret string  required 

     * @response
     * {
    "message": "Search results",
    "data": {
        "post": [
            {
                "post_id": 7,
                "title": "Delectus nulla ipsa",
                "description": "Id exercitationem la",
                "type": 5,
                "image": "1636622132.png",
                "status": 1,
                "tags": "Tenetur voluptatem s",
                "views": 0,
                "likes": 0,
                "created_at": "2021-11-11T10:15:32.000000Z"
            }
        ]
    },
    "status": 200
}

      * @response status=400 scenario="title validation" 
     *{
    "error": {
        "title": [
            "The title field is required."
        ]
    },
    "status": 400
 }

   */
    public function searchPost(Request $request){
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
            ], 
            400);  
    }
    
    $post=Post::where('title','like',"%$request->title%")->select('post_id','title','description','type','image','status','tags','views','likes','created_at')->paginate('5');
    return response()->json([
        'message'=>'Search results ',
        'data'=>[
            'post'=>$post
        ],
       
        'status'=>200
    ], 
    200);
    }
    public function postfilter(Request $request){

    if($request->has('populor') && $request->has('type')){
            $post=Post::where('type',$request->type)->select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('likes','desc')->paginate('5');

        }
        elseif($request->has('older') && $request->has('type')){
            $post=Post::where('type',$request->type)->select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('created_at')->paginate('5');

        }
        
        elseif($request->has('latest') && $request->has('type')){
            
            $post=Post::where('type',$request->type)->select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('created_at','desc')->paginate('5');

        }
        else if($request->has('populor')){
                $post=Post::select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('likes','desc')->paginate('5');
    
        }
        elseif($request->has('older')){
                $post=Post::select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('created_at')->paginate('5');
    
        }
            
        else{
            
            $post=Post::select('post_id','title','description','type','image','status','tags','views','likes','created_at')->orderBy('created_at','desc')->paginate('5');

        }
        return response()->json([
            'message'=>'Search results ',
            'data'=>[
                'post'=>$post
            ],
           
            'status'=>200
        ], 
        200);
    }
    
}
