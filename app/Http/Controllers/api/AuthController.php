<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SigupMail;
use App\Mail\SENDOTP;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;
use Carbon\Carbon;
/**
 * @group Authentication Apis
 *
 * APIs for managing users
 */

class AuthController extends Controller
{
     /**
     * @bodyParam first_name string required The first_name of the user.
     * @bodyParam last_name string required The last_name of the user.
     * @bodyParam email email required The email of the user.
     * @bodyParam password string  required The password of the user.
     * @bodyParam secret string  required

     * @response
     * {
    "message": "User Created Successfully",
    "data": {
        "user": {
            "first_name": "john",
            "last_name": "arthor",
            "email": "talha.hussain@eegamesstudio.com",
            "user_role": 5,
            "otp": 49013,
            "updated_at": "2021-11-16T14:36:28.000000Z",
            "created_at": "2021-11-16T14:36:28.000000Z",
            "id": 25
        }
    },
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzkwODM0ZDM3Y2E0ODYyMGRiOTgwOWRlOGZmMWFiZGExNjNhOGFiMzliNDVlYzk1ZTkyMDgxNWQ5N2JmNzcwNzI2YTY4ZWJlNWQxZDMyNTEiLCJpYXQiOjE2MzcwNzMzOTIuNTUyODg5LCJuYmYiOjE2MzcwNzMzOTIuNTUyODk0LCJleHAiOjE2Njg2MDkzOTIuNDU5MTc1LCJzdWIiOiIyNSIsInNjb3BlcyI6W119.PYqR8TxywalG2RuUIqczm35pLbUQjN47rN4m3mXRTeswykcBATQtqj9azznqOOlk1z3-jZDb9g8JJut-v3buYE_bjjeugGACoH0FuKfNXKUxClbF1E0Yx3COcXqumWQ0Y3rlkrygg5JU-vks1HSZXNdEQ6YX8VUsIDRm-dUjDLFJVSdhfVnr5_LnZwFNqyoAeObDac0tQPc8ad3UL6s2T-BNVP2hj86JTGNz1PtjMAPPmmQLEYT6mhGaghZAPSqEcP16s2ZAa0Dm9lxHVjOCF11x2vQ39FC4H_WuxPv1PcnWGX4VNHqxbong-UZ7kmj7s8L0fa9h70QLo4-B3U-PDuqZ7ddMUlJOaXfbRHBoSZAqHhCCVziSTBwQG1D-MuBoyjQZlVq9LI2Fsk-5ygCaooMDTfnfAKK2tZXGNe1qETTOOl3AQ383SPPC5LJEqpIgnJ-3YXdEiJybZ7HmModoT3hzENTQJ_387efZdDxfFrNVx3RslIch4zRDIVrOtWkankzEVF0Rs3ci8ViRLym31XJT_Ffr9U4fZFmD9TLQfjNhhQUK2tRR5DCNupkFhoPq8ardHZQ6lyq_AdUQtPg5MX3dywCd9GTXnqp8JUQGk3FNzYkOS-Zf1O48FIUk7QiAiG5XWqvt5GaTOlrdjz71sDQsEr5MspQsQ06Xf-P3SzY",
    "status": 200
}

      * @response status=400 scenario="first_name validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The first name field is required.",
    "status": 400
}
  * @response status=400 scenario="last_name validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The last name field is required.",
    "status": 400
}
  * @response status=400 scenario="email validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The email field is required.",
    "status": 400
}
 * @response status=400 scenario="password validation"
     * {
    "message": "Please fix the following error to continue",
    "errors": "The password field is required.",
    "status": 400
}


   */
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'device_key'=>'required',
        ]);
        if ($validator->fails()) {

            $errors = implode(', ', $validator->errors()->all());
            return  response([
                  'message' => 'Please fix the following error to continue',
                  'errors'   => $errors,
                  'status'    =>400
              ], 400);
          }
    $otp=rand(10000,99999);
    $user=new User();
    $user->first_name=$request->first_name;
    $user->last_name=$request->last_name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->user_role=5;
    $user->otp=$otp;
    $user->device_key=$request->device_key;
    $user->save();
    $data = array('name'=> $user->first_name.' '.$user->last_name, "otp" => $otp,
    'email' => $user->email
);

Mail::to($request->email)->send(new SigupMail($data));
    $token=$user->createToken('MyApp')-> accessToken;

    return response()->json([
        'message'=>'User Created Successfully',
        'data'=>[
            'user'=>$user
        ],
        'access_token'=>$token,
            'status'=>200
    ],
    200);

}

 /**
     * @bodyParam email email required The email of the user.
     * @bodyParam password string  required The password of the user.
     * @bodyParam secret string  required

     * @response
     * {
    "data": {
        "users": {
            "id": 25,
            "first_name": "john",
            "last_name": "arthor",
            "email": "talha.hussain@eegamesstudio.com",
            "phone": null,
            "email_verified_at": null,
            "image": null,
            "user_role": 5,
            "status": 1,
            "otp": "49013",
            "created_at": "2021-11-16T14:36:28.000000Z",
            "updated_at": "2021-11-16T14:36:28.000000Z",
            "deleted_at": null
        }
    },
    "message": "You have successfully logged in ",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2E5ZmM3OWY3MmNkZDMyODE3N2NkNDkxNDJlZDZlOTAzOTAzMTUwYjNlNWU3MjQyNjQwZjZkMjAyNzJkY2UyNGZlNzA3MGU1OTI4ODBmZGUiLCJpYXQiOjE2MzcwNzM0MTkuNjYxMzIyLCJuYmYiOjE2MzcwNzM0MTkuNjYxMzI3LCJleHAiOjE2Njg2MDk0MTkuNjAzMzY5LCJzdWIiOiIyNSIsInNjb3BlcyI6W119.v6w2YpbsIH9zvfZAbWYw_cEGJIKT2W6svWGQDtfmujhqQlbaCcGylsq6rcJ69Gx7NoYEN_4VIQ_Yj6bxwxf52Gxzwq5FRpujwDD2Yd6sZJzZpY9QMzXi2yXvxAJPrk6uv1Db2iNekumBv6bt0lJfnDEgi7LbBtVZsHb7IQl4-4bHWBhBX0NZymcVmdsRwAx1YTzk9CXidFnTJHJqGjKUWSmBR34Z2obQGTcOMIcZ_55tKTGx9lgR9DMaN3wLiYkNWc6W_ToObZgEtbwsiFzCtJe-4YL86bAivZTfHoM0ol6fn92NqF5YN2Ujq0U8rM21XFyhx4VPT7JcOxcjncQOdeZcr90xFfMb4elBQ-VTwUB3xHcoesceoxCmnV2n3PUSWBHdj4BsLYoTGSt-3m3rEmdphVybdC7FO-eh0BrGoMBJosQg1ts11tapN4Z72orJf2k8ZK6iA6dAf551eHzb-u2zllJGswdvPH0YjvG23eTTdpfYB3jnKLMOXutVfipEtaYhSkq-aKKAcbMRmnnkVSUvTh5TFnmoaluYLiAteAG8vQLM_vb_DJej0GLsTpCZg-Qhp2I3P98tnqyxeBb4Ypvuw-ulfEmtwq4OcDHB5A7PGCeem45dkj-ouuy6dVydtEgWGzP0txZxJqGNB2wvv7jXwFFJYNwbZUpf-XXzyZg",
    "status": 200
}

  * @response status=400 scenario="email validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The email field is required.",
    "status": 400
}
 * @response status=400 scenario="password validation"
     * {
    "message": "Please fix the following error to continue",
    "errors": "The password field is required.",
    "status": 400
}

 * @response status=400 scenario="auth  credentials mismatch"
     * {
    "message": "These credentials do not match our records.",
    "status": 400
}
   */
        public function login(Request $request){
         if($request->has('password')){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            "password" => "required",
            'device_key'=>'required',

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }

        $user= User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password) ){
            return response([
                'message'=>'Invalid Credentials',
                'status'=>400,
            ], 401);
        }
        if($user->status==0){
            return response([
                'message' => 'Account is blocked Kindly contact to admin.',
                'status'   => 403
            ], 403);
        }
        if($user->email_verified_at==null){
            $otp=rand(10000,99999);
            $user1= User::where('email', $request->email)->update(['otp'=>$otp]);
            $data = array('name'=> $user->first_name.' '.$user->last_name, "otp" => $otp,
                       'email' => $user->email);

                Mail::to($request->email)->send(new SigupMail($data));
                $token=$user->createToken('MyApp')-> accessToken;
                $data= array('user'=>$user,'otp'=>$otp);

            return response([
                'data'      => $data,
                'message' => 'Account is not verified kindly first verify your account.',
                'status'   => 401
            ], 401);
        }
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'These credentials do not match our records.',
                'status'   => 400
            ], 400);
        }
        $device_token=User::where('email', $request->email)->update(['device_key'=>$request->device_key]);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $data= array('user'=>$user);
        $response = [
            'data'      => $data,
            'message'   => 'You have successfully logged in ',
            'token'     => $tokenResult->accessToken,
            'status'    =>200
        ];
        return response($response, 200);
    }
    elseif($request->has('facebook_id')){
        $user=User::where('facebook_id',$request->facebook_id)->get();
        $count=count($user);
        if($count>0){
            $user= User::where('facebook_id', $request->facebook_id)->first();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);
        }
        else{
            $user=new User();
            $user->first_name=$request->name;
            $user->user_role=5;
            $user->email_verified_at=Carbon::now()->toDateTimeString();
            $user->facebook_id=$request->facebook_id;
            $user->save();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);
        }


    }
    elseif($request->has('google_id')){
        $user=User::where('google_id',$request->google_id)->get();
        $count=count($user);
        if($count>0){
            $user=User::where('google_id',$request->google_id)->first();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);
        }
        else{
            $user=new User();
            $user->first_name=$request->name;
            $user->email=$request->email;
            $user->user_role=5;
            $user->email_verified_at=Carbon::now()->toDateTimeString();
            $user->google_id=$request->google_id;
            $user->save();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);

        }


    }
    elseif($request->has('apple_id')){
        $user=User::where('apple_id',$request->apple_id)->get();
        $count=count($user);
        if($count>0){
            $user=User::where('apple_id',$request->apple_id)->first();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);
        }
        else{
            $user=new User();
            $user->first_name=$request->name;
            $user->user_role=5;
            $user->email_verified_at=Carbon::now()->toDateTimeString();
            $user->apple_id=$request->apple_id;
            $user->save();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $data= array('user'=>$user);
            $response = [
                'data'      => $data,
                'message'   => 'You have successfully logged in ',
                'token'     => $tokenResult->accessToken,
                'status'    =>200
            ];
            return response($response, 200);
        }


    }
    }


 /**
     * @bodyParam otp integer required The otp of the user.
     * @bodyParam secret string  required

     * @response
     *{
    "message": "User accout verified Successfully",
    "data": {
        "user": {
            "id": 22,
            "first_name": "john",
            "last_name": "arthor",
            "email": "talha.hussain@eegamesstudio.com",
            "phone": null,
            "email_verified_at": null,
            "image": null,
            "user_role": 5,
            "status": 1,
            "otp": "94539",
            "created_at": "2021-11-16T10:27:11.000000Z",
            "updated_at": "2021-11-16T10:27:11.000000Z",
            "deleted_at": null
        }
    },
    "status": 200
}

  * @response status=400 scenario="email validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The otp field is required.",
    "status": 400
}
   */

    public function account_verify(Request $request){
        $validator = Validator::make($request->all(), [
            'otp' => 'required',

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        $user=User::where('otp',$request->otp)->first();
        // return $user;
        $user1=User::where('otp',$request->otp)->update(['email_verified_at'=> Carbon::now()->toDateTimeString()]);
        return response()->json([
            'message'=>'User account verified Successfully',
            'data'=>[
                'user'=>$user
            ],
                'status'=>200
        ],
        200);
    }


 /**
     * @bodyParam email email required The email of the user.
     * @bodyParam secret string  required

     * @response
     *{
    "message": "Otp has sended on your email kindly check your email",
    "data": {
        "user": {
            "id": 22,
            "first_name": "john",
            "last_name": "arthor",
            "email": "talha.hussain@eegamesstudio.com",
            "phone": null,
            "email_verified_at": null,
            "image": null,
            "user_role": 5,
            "status": 1,
            "otp": 66272,
            "created_at": "2021-11-16T10:27:11.000000Z",
            "updated_at": "2021-11-16T11:52:42.000000Z",
            "deleted_at": null
        }
    },
    "status": 200
}

  * @response status=400 scenario="email validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The email field is required.",
    "status": 400
}

* @response status=400 scenario="email verification"
     *{
    "message": "This email is not registered",
    "status": 400
}
   */

    public function sendOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',

        ]);
        if ($validator->fails()) {

          $errors = implode(', ', $validator->errors()->all());
          return  response([
                'message' => 'Please fix the following error to continue',
                'errors'   => $errors,
                'status'    =>400
            ], 400);
        }
        $user=User::where('email',$request->email)->first();
        $otp=rand(10000,99999);
        $user->update(['otp'=>$otp]);
        if($user!=null){
        $data = array('name'=> $user->first_name.' '.$user->last_name, "otp" =>$otp,
        'email' => $user->email
    );

    Mail::to($user->email)->send(new SENDOTP($data));
    return response()->json([
        'message'=>'Otp has sended on your email kindly check your email',
        'data'=>[
            'user'=>$user
        ],
            'status'=>200
    ],
    200);
        }
        else{
            return response()->json([
                'message'=>'This email is not registered' ,
                    'status'=>400
            ],
            400);
        }
    }

    /**
     * @bodyParam secret string  required

     * @response
     *{
    "message": "Your profile data is below",
    "data": {
        "user": {
            "id": 22,
            "first_name": "john",
            "last_name": "arthor",
            "email": "talha.hussain@eegamesstudio.com",
            "phone": null,
            "email_verified_at": null,
            "image": null,
            "user_role": 5,
            "status": 1,
            "otp": "66272",
            "created_at": "2021-11-16T10:27:11.000000Z",
            "updated_at": "2021-11-16T11:52:42.000000Z",
            "deleted_at": null
        }
    },
    "status": 200
}


   */
    public function userProfile(Request $request){
        $user=$request->user();
        return response()->json([
            'message'=>'Your profile data is below',
            'data'=>[
                'user'=>$user
            ],
                'status'=>200
        ],
        200);

    }

    /**
     * @bodyParam secret string  required

     * @response
     *{
    "message": "Your have loged out successfully",
    "status": 200
}


   */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message'=>'Your have loged out successfully',

                'status'=>200
        ],
        200);
    }

      /**
     * @bodyParam first_name string required The first_name of the user.
     * @bodyParam last_name string required The last_name of the user.
     * @bodyParam email email required The email of the user.
     * @bodyParam password string  required The password of the user.
     * @bodyParam secret string  required

     * @response
     * {
    "message": "Your profile has updateds successfully",
    "status": 200
}

      * @response status=400 scenario="first_name validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The first name field is required.",
    "status": 400
}
  * @response status=400 scenario="last_name validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The last name field is required.",
    "status": 400
}
  * @response status=400 scenario="phone validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The phone field is required.",
    "status": 400
}
  * @response status=400 scenario="email validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The email field is required.",
    "status": 400
}
 * @response status=400 scenario="password validation"
     * {
    "message": "Please fix the following error to continue",
    "errors": "The password field is required.",
    "status": 400
}


   */
    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
            ],
            400);
    }
    $user=User::where('email',$request->email)->update([
        'first_name' =>$request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'password' => Hash::make($request->password)
    ]);
    return response()->json([
        'message'=>'Your profile has updateds successfully',

            'status'=>200
    ],
    200);
    }

    /**
     * @bodyParam user_id integer required The id of the user.
     * @bodyParam password string required The password of the user.
     * @bodyParam secret string  required

     * @response
     *{
    "message": "Your password has updated successfully",
    "status": 200
}
  * @response status=400 scenario="user_id validation"
     *{
    "message": "Please fix the following error to continue",
    "errors": "The user id field is required.",
    "status": 400
}

* @response status=400 scenario="password verification"
     *{
    "message": "This password is not registered",
    "status": 400
}
   */
    public function updatPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->errors(),
                    'status'=>400
            ],
            400);
    }
    $user=User::where('id',$request->user_id)->update([
        'password' => Hash::make($request->password)
    ]);
    return response()->json([
        'message'=>'Your password has updated successfully',
            'status'=>200
    ],
    200);

    }
}
