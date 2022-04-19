<!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Email</title>
     <meta charset="utf-8">
     <!-- <link rel="shortcut icon" type="image/png" href="../../assets/images/dummy/eco-1024 crop.png" /> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
 <style>
 </style>

 <body style=" font-family: Arial, Helvetica, sans-serif !important;">
 <div style="padding: 50px 0px; text-align: center;

	">


     <div style="max-width:650px;
margin: auto;
padding:35px 35px;">
         <div class="row" style="
  padding: 20px 0px 0px 0px !important;
  background: rgb(255,255,255) !important;
  width:100%;
  max-width:100%  !important;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0px 6px 12px rgba(0,0,0,0.16);
  ">
             <div class="col-12">
                 <div style="
    width:150px;
    max-width: 600px !important;
    padding: 10px 0px;
    text-align: center;display: inline-block; ">
                     <img style="width: 100%; object-fit: contain;" src="{{asset('assets/images/logo.png')}}">
                 </div>

                 <div style="margin-top: 1rem;">
                     <div>
                         <div style="margin-bottom: 20px; display: inline-block; width: 100%;">
                             <p style="
    font-size: 17px;
    color: #000;
    line-height: 1.2;
    font-weight: 500;">Dear User,</p>
                             <p style="
    font-size: 14px;
    color: #848484;
    line-height: 1.2;
    letter-spacing: 0.03rem;">We have received password reset request for your account </p>


                             <p style="
    font-size: 14px;
    color: #848484;
    line-height: 1.2;
    letter-spacing: 0.03rem;">Please click   <a href="{{ route('reset-password', $user_token) }}">here</a> to reset your password
                                 . If you did not initiate this request please ignore this message.
                             </p>

                         </div>

                         <p style="
            font-size: 16px;
            color: #000;
            line-height: 1.6;
            font-weight: 600;
            letter-spacing: .04rem; margin-top: 2px;margin-bottom:0;">Regards Chrysalis Team</p>

                         <p style="
            font-size: 14px;
            color: #848484; margin-top: 0;
            line-height: 1.2;">This is an automated message, Please do not reply.</p>
                     </div>
                     <div style="
          padding: 10px 0px;
          background-repeat: no-repeat;
          background-size: cover;
          border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
          background: #795BF1;">



                         <div >

                             <div>
                                 <p style="color: #fff;
             font-size: 14px;
             font-weight: 500;
             letter-spacing: 0.03em;
             padding: 15px 0px;
             /* margin-top: 8px; */
             margin: 0;">© Chrysalis All Rights Reserved</p>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>


         </div>











     </div>
 </body>

 </html>
