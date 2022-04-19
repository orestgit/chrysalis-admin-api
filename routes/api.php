<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\VerifyEmailController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\LessonController;
use App\Http\Controllers\api\QuizController;
use App\Http\Controllers\api\ProtocolController;
use App\Http\Controllers\api\WalletController;
use App\Http\Controllers\api\meetingPackagesController;
use App\Http\Controllers\api\MeetingController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("register",[AuthController::class,'register'])->name('register');
Route::post("login",[AuthController::class,'login'])->name('login');

Route::post("account-verify",[AuthController::class,'account_verify'])->name('account_verify');
Route::post("send-otp",[AuthController::class,'sendOTP'])->name('sendOTP');

Route::post("reset-password",[AuthController::class,'updatPassword'])->name('updatPassword');


Route::post("protocol-chapters",[ProtocolController::class,'ProtocolChapters'])->name('protocol-chapters');
Route::post("chapter-questions",[ProtocolController::class,'ChapterQuestions'])->name('chapter-questions');

Route::post("protocol-submission",[ProtocolController::class,'submitProtocol'])->name('protocol-submission');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post("user-profile",[AuthController::class,'userProfile'])->name('userProfile');
    Route::post("logout",[AuthController::class,'logout'])->name('logout');
    Route::post("update-profile",[AuthController::class,'updateProfile'])->name('updateProfile');
    Route::post("update-password",[AuthController::class,'updatPassword'])->name('updatPassword');

    Route::post("like-post",[PostController::class,'likePost'])->name('like-post');
    Route::post("view-posts",[PostController::class,'viewPost'])->name('viewPost');
    Route::post("post-details",[PostController::class,'postDetails'])->name('postDetails');
    Route::post("search-post",[PostController::class,'searchPost'])->name('searchPost');
    Route::post("post-filter",[PostController::class,'postfilter'])->name('postfilter');

    Route::post("view-course",[CourseController::class,'viewCourse'])->name('viewCourse');
    Route::post("view-users-courses",[CourseController::class,'user_courses'])->name('user_courses');
    Route::post("user-course-details",[CourseController::class,'user_course_details'])->name('user_course_details');
    Route::post("like-course",[CourseController::class,'likeCourse'])->name('likeCourse');
    Route::post("course-details",[CourseController::class,'courseDetails'])->name('courseDetails');
    Route::post("lesson-details",[LessonController::class,'lessonDetails'])->name('lessonDetails');

    Route::post("get-quiz",[QuizController::class,'getQuiz'])->name('getQuiz');
    Route::post("attempt-quiz",[QuizController::class,'AttemptQuiz'])->name('Attempt_quiz');
    Route::post("get-quiz-result",[QuizController::class,'getQuizResult'])->name('getQuizResult');
    Route::post("protocol-quiz-question",[QuizController::class,'protocolQuizQuestion'])->name('protocolQuizQuestion');
    Route::post("attempt-protcol-quiz",[QuizController::class,'AttemptProtcolQuiz'])->name('attempt-protcol-quiz');

    Route::post("get-protocols",[ProtocolController::class,'getProtocols'])->name('getProtocols');
    Route::post("search-protocols",[ProtocolController::class,'searchProtocols'])->name('searchProtocols');
    Route::post("protocol-details",[ProtocolController::class,'protocolDetail'])->name('protocolDetail');

    Route::post("course-purchase-details",[WalletController::class,'getCourseurchase'])->name('course-purchase-details');
    Route::post("get-course-token-packages",[WalletController::class,'getCourseTokenPackages'])->name('get-course-token-packages');
    Route::post("buy-tokens",[WalletController::class,'buyTokens'])->name('buy-tokens');
    Route::post("buy-course",[WalletController::class,'buyCourse'])->name('buy-course');
    Route::post("my-wallet",[WalletController::class,'userWallet'])->name('my-wallet');

    Route::post("add-meeting",[MeetingController::class,'store'])->name('add-meeting');
    Route::post("my-meetings",[MeetingController::class,'MyMeetings'])->name('my-meetings');
    Route::post("end-meeting",[MeetingController::class,'endMeeting'])->name('end-meeting');
    Route::post("meeting-packages",[MeetingController::class,'MeetingPackages'])->name('meeting-packages');

});
