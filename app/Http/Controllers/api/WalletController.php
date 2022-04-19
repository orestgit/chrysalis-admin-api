<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\Wallet;
use App\Models\TokenPackages;
use App\Models\WalletPayments;
use App\Models\CourseEnrollment;

use Stripe; 

class WalletController extends Controller
{   
    public function getCourseurchase(Request $request){
     
        $course=Course::select('course_id as id','title','lesson_duration','type','method','price','summary','image','views','likes')->where('course_id',$request->course_id)->first();
            $course->total_lesson=CourseLesson::where('course_id',$course->id)->count();
            $wallet=Wallet::where('user_id',$request->user_id)->first();
            
            return response()->json([
                'message'=>'course price details',
                'data'=>[
                    'course'=>$course,
                    'wallet'=>$wallet
                    ],
                    'status'=>200
            ], 
            200);
    }
    public function getCourseTokenPackages(Request $request){
        $package=TokenPackages::get();
        return response()->json([
            'message'=>'Token Packages',
            'data'=>[
                'packages'=>$package,
                ],
                'status'=>200
        ], 
        200);
    }
    public function buyTokens(Request $request){
        $packag_id=$request->package_id;
        $package=TokenPackages::where('token_packages_id',$packag_id)->first();
        

        Stripe\Stripe::setApiKey('sk_test_lf2gRsqRfyztsYJcSJPspCIF');
        $payment=Stripe\Charge::create ([
                "amount" => $package->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "test payment from charysalis" 
        ]);
        $wallet=Wallet::where('user_id',$request->user_id)->first();
        
        if($wallet==null){
            $wallet_token=new Wallet();
            $wallet_token->user_id=$request->user_id;
            $wallet_token->available_tokens=$package->token;
            $wallet_token->status=1;
            $wallet_token->save();
        }
        else{
            $wallet=Wallet::where('user_id',$request->user_id)->first();
            $tokens=$wallet->available_tokens+$package->token;
            $wallet_token=Wallet::where('user_id',$request->user_id)->update(['available_tokens'=>$tokens]);
        }
        $stipe_payment=new WalletPayments();
        $stipe_payment->user_id=$request->user_id;
        $stipe_payment->tokens=$package->token;
        $stipe_payment->payment=$package->price;
        $stipe_payment->charge_id=$payment['id'];
        $stipe_payment->save();
        return response()->json([
            'message'=>'Token has been added in your wallet',
                'status'=>200
        ], 
        200);

    }

    public function buyCourse(Request $request){
        $check_price=Course::where('course_id',$request->course_id)->first();
        $check_token=Wallet::where('user_id',$request->user_id)->first();
        if($check_token==null){
            return response()->json([
                'message'=>'Your Wallete is empty Kindly recharge Your Walete',
                    'status'=>400
            ], 
            400); 
        }
     
        if($check_token->available_tokens<$check_price->price){
            return response()->json([
                'message'=>'Token is less than course required token',
                    'status'=>400
            ], 
            400); 
        }
        else{
        $course=new CourseEnrollment();
        $course->course_id=$request->course_id;
        $course->user_id=$request->user_id;
        $course->status=1;
        $course->save();
        $remaining_token=$check_token->available_tokens-$check_price->price;
        $check_token=Wallet::where('user_id',$request->user_id)->update(['available_tokens'=>$remaining_token]);

        return response()->json([
            'message'=>'you have successfuly buy course',
                'status'=>200
        ], 
        200); 
        }
    }

    public function userWallet(Request $request){
        $wallet=Wallet::where('user_id',$request->user_id)->get();
        return response()->json([
            'message'=>'your wallet details',
            'data'=>[
                'wallet'=>$wallet,
            ],
                'status'=>200
        ], 
        200); 
    }

}
