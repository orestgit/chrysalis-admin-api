<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminPostTypeController;
use App\Http\Controllers\admin\AdminCourseCategoryController;
use App\Http\Controllers\admin\AdminCourseController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminLessonController;
use App\Http\Controllers\admin\AdminLessonQuizController;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\AdminProtocolController;
use App\Http\Controllers\admin\AdminProtocolQuestionController;
use App\Http\Controllers\admin\AdminPackagesController;
use App\Http\Controllers\admin\meetingPackagesController;
use App\Http\Controllers\admin\AdminMeetingController;
use App\Http\Controllers\admin\AdminCourseAdvertisementController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminProtocolChapterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\admin\SurgicalCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return new \App\Mail\UserInvitationEmail();
});
Auth::routes(['verify' => true]);
Route::get("admin-login",[AdminController::class,'login'])->name('admin-login');


/*Route::group(['prefix'=>'user', 'middleware'=>['isUser']], function() {
    Route::get("user-dashboard",[UserController::class,'index'])->name('user-dashboard');

    Route::Post("update-profile",[UserController::class,'updateProfile'])->name('update-user-profile');
    Route::get("delete-education",[UserController::class,'deleteEducation'])->name('delete-education');
    Route::get("user-settings",[UserController::class,'settings'])->name('user-settings');

});*/


Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('submit-forgot-password');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('post-reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('post-reset-password');

Route::group(['prefix'=>'admin', 'middleware'=>['customAuth']], function() {
    Route::get("dashboard",[AdminDashboardController::class,'index'])->name('admin-dashboard');

    Route::get("creat-post-type",[AdminPostTypeController::class,'create'])->name('creat-post-type');
    Route::get("list-post-types",[AdminPostTypeController::class,'index'])->name('list-post-types');
    Route::get("delete-post-type",[AdminPostTypeController::class,'delete'])->name('delete-post-type');
    Route::get("edit-post-type",[AdminPostTypeController::class,'edit'])->name('edit-post-type');
    Route::post("update-post-type",[AdminPostTypeController::class,'update'])->name('update-post-type');
    Route::post("store-post-type",[AdminPostTypeController::class,'store'])->name('store-post-type');

    Route::get("list-users",[AdminUserController::class,'index'])->name('list-users');
    Route::post("add-user",[AdminUserController::class,'store'])->name('add-user');
    Route::get("user-profile",[AdminUserController::class,'userProfile'])->name('user-profile');
    Route::get("block-user",[AdminUserController::class,'block'])->name('block-user');
    Route::get("unblock-user",[AdminUserController::class,'unblock'])->name('unblock-user');


    Route::get("list-posts",[AdminPostController::class,'index'])->name('list-posts');
    Route::get("create-post",[AdminPostController::class,'create'])->name('create-post');
    Route::post("store-post",[AdminPostController::class,'store'])->name('store-post');
    Route::get("view-post",[AdminPostController::class,'view'])->name('view-post');
    Route::get("delete-post",[AdminPostController::class,'delete'])->name('delete-post');
    Route::get("edit-post",[AdminPostController::class,'edit'])->name('edit-post');
    Route::post("update-post",[AdminPostController::class,'update'])->name('update-post');
    Route::get("update-post-status",[AdminPostController::class,'updatePostStatus'])->name('update-post-status');
    Route::post("get-posts-by-status",[AdminPostController::class,'getPostsByStatus'])->name('get-posts-by-status');


    Route::delete('delete-post-attachment/{id}',[AdminPostController::class,'deletePostAttachment'])->name('delete-post-attachment');
    Route::get("create-course-category",[AdminCourseCategoryController::class,'create'])->name('create-course-category');
    Route::get("edit-course-category",[AdminCourseCategoryController::class,'edit'])->name('edit-course-category');
    Route::get("delete-course-category",[AdminCourseCategoryController::class,'delete'])->name('delete-course-category');
    Route::post("store-course-category",[AdminCourseCategoryController::class,'store'])->name('store-course-category');
    Route::get("list-course-categories",[AdminCourseCategoryController::class,'index'])->name('list-course-categories');
    Route::post("update-course-category",[AdminCourseCategoryController::class,'update'])->name('update-course-category');


    Route::get("create-course",[AdminCourseController::class,'create'])->name('create-course');
    Route::post("store-course",[AdminCourseController::class,'store'])->name('store-course');
    Route::get("list-courses",[AdminCourseController::class,'index'])->name('list-courses');
    Route::get("delete-course",[AdminCourseController::class,'delete'])->name('delete-course');
    Route::get("edit-course",[AdminCourseController::class,'edit'])->name('edit-course');
    Route::post("update-course",[AdminCourseController::class,'update'])->name('update-course');
    Route::get("view-course-enrollments",[AdminCourseController::class,'courseEnrollments'])->name('view-course-enrollments');

    Route::get("course-banners",[AdminCourseAdvertisementController::class,'index'])->name('course-banners');
    Route::get("create-course-banners",[AdminCourseAdvertisementController::class,'create'])->name('create-course-banners');
    Route::post("store-course-advertisement",[AdminCourseAdvertisementController::class,'store'])->name('store-course-advertisement');
    Route::get("get-course-advertisement",[AdminCourseAdvertisementController::class,'edit'])->name('get-course-advertisement');
    Route::post("update-course-advertisement",[AdminCourseAdvertisementController::class,'update'])->name('update-course-advertisement');
    Route::get("delete-course-advertisement",[AdminCourseAdvertisementController::class,'delete'])->name('delete-course-advertisement');

    Route::post("save-lesson",[AdminLessonController::class,'store'])->name('save-lesson');
    Route::get("lesson-detail",[AdminLessonController::class,'lessonDetail'])->name('lesson-detail');
    Route::post("lesson-questions",[AdminLessonController::class,'lessonQuestions'])->name('lesson-questions');
    Route::get("delete-lesson",[AdminLessonController::class,'delete'])->name('delete-lesson');
    Route::get("edit-lesson",[AdminLessonController::class,'edit'])->name('edit-lesson');
    Route::post("update-lesson",[AdminLessonController::class,'update'])->name('update-lesson');

    Route::get("manage-quiz",[AdminLessonQuizController::class,'manageQuiz'])->name('manage-quiz');
    Route::post("save-quiz",[AdminLessonQuizController::class,'saveQuiz'])->name('save-quiz');
    Route::post("update-quiz",[AdminLessonQuizController::class,'updateQuiz'])->name('update-quiz');
    Route::get("manage-quiz-questions",[AdminLessonQuizController::class,'manageQuizQuestions'])->name('manage-quiz-questions');
    Route::get("edit-quiz-questions",[AdminLessonQuizController::class,'editQuizQuestions'])->name('edit-quiz-questions');
    Route::post("create-quiz-questions",[AdminLessonQuizController::class,'createQuizQuestions'])->name('create-quiz-questions');
    Route::post("delete-quiz-question",[AdminLessonQuizController::class,'deleteQuizQuestion'])->name('delete-quiz-question');
    Route::post("update-quiz-questions",[AdminLessonQuizController::class,'updateQuizQuestions'])->name('update-quiz-questions');

    Route::get("create-protocol",[AdminProtocolController::class,'create'])->name('create-protocol');
    Route::get("list-protocols",[AdminProtocolController::class,'index'])->name('list-protocols');
    Route::post("store-protocol",[AdminProtocolController::class,'store'])->name('store-protocol');
    Route::get("edit-protocol",[AdminProtocolController::class,'edit'])->name('edit-protocol');
    Route::post("delete-protocol",[AdminProtocolController::class,'delete'])->name('delete-protocol');
    Route::delete('delete-protocol-attachment/{id}',[AdminProtocolController::class,'deleteProtocolAttachment'])->name('delete-protocol-attachment');
    Route::post('update-protocol',[AdminProtocolController::class,'update'])->name('update-protocol');
    Route::get("delete-protocol",[AdminProtocolController::class,'delete'])->name('delete-protocol');
    Route::get("view-protocol-attempts",[AdminProtocolController::class,'attempts'])->name('view-protocol-attempts');
    Route::get("protocol-submission-details",[AdminProtocolController::class,'protocolSubmissionDetails'])->name('protocol-submission-details');
    Route::post("delete-protocol-question",[AdminProtocolController::class,'deleteProtocolQuestion'])->name('delete-protocol-question');


    Route::get("create-protocol-chapter",[AdminProtocolChapterController::class,'create'])->name('create-protocol-chapter');
    Route::get("list-protocol-chapters",[AdminProtocolChapterController::class,'index'])->name('list-protocol-chapters');
    Route::post("store-protocol-chapter",[AdminProtocolChapterController::class,'store'])->name('store-protocol-chapter');
    Route::any("delete-protocol-chapter",[AdminProtocolChapterController::class,'delete'])->name('delete-protocol-chapter');
    Route::get("edit-protocol-chapter",[AdminProtocolChapterController::class,'edit'])->name('edit-protocol-chapter');
    Route::post("delete-chapter-question",[AdminProtocolChapterController::class,'deleteChapterQuestion'])->name('delete-chapter-question');
    Route::post("update-protocol-chapter",[AdminProtocolChapterController::class,'updateChapter'])->name('update-protocol-chapter');


    Route::get("list-packages",[AdminPackagesController::class,'index'])->name('list-packages');
    Route::get("create-package",[AdminPackagesController::class,'create'])->name('create-package');
    Route::post("store-package",[AdminPackagesController::class,'store'])->name('store-package');
    Route::get("edit-package",[AdminPackagesController::class,'edit'])->name('edit-package');
    Route::get("delete-package",[AdminPackagesController::class,'delete'])->name('delete-package');
    Route::post('update-package',[AdminPackagesController::class,'update'])->name('update-package');

    Route::get("list-meeting-packages",[meetingPackagesController::class,'index'])->name('list-meeting-packages');
    Route::get("create-meeting-package",[meetingPackagesController::class,'create'])->name('create-meeting-package');
    Route::post("store-meeting-package",[meetingPackagesController::class,'store'])->name('store-meeting-package');
    Route::get("edit-meeting-package",[meetingPackagesController::class,'edit'])->name('edit-meeting-package');
    Route::get("delete-meeting-package",[meetingPackagesController::class,'delete'])->name('delete-meeting-package');
    Route::post('update-meeting-package',[meetingPackagesController::class,'update'])->name('update-meeting-package');


    Route::get('pending-meetings',[AdminMeetingController::class,'PendingMeetings'])->name('pending-meetings');
    Route::get('assigned-meetings',[AdminMeetingController::class,'AssignedMeetings'])->name('assigned-meetings');
    Route::get('completed-meetings',[AdminMeetingController::class,'CompletedMeetings'])->name('completed-meetings');
    Route::get('meeting-details',[AdminMeetingController::class,'MeetingDetails'])->name('meeting-details');
    Route::get('delete-meeting',[AdminMeetingController::class,'deleteMeeting'])->name('delete-meeting');
    Route::post('assign-meeting',[AdminMeetingController::class,'assignMeeting'])->name('assign-meeting');
    //Route that made
    Route::get('meetings',[AdminMeetingController::class,'Meetings'])->name('Meetings');
    Route::get('meetings-list/{date}',[AdminMeetingController::class,'meetingsList'])->name('meetingsList');
    Route::get('all-meetings-list',[AdminMeetingController::class,'allMeetingsList'])->name('allMeetingsList');
    Route::get('calender-listing',[AdminMeetingController::class,'calenderListing'])->name('calenderListing');


    Route::get("manage-protocol-questions",[AdminProtocolQuestionController::class,'manageProtocolQuestions'])->name('manage-protocol-questions');
    Route::post("set-protocol-questions",[AdminProtocolQuestionController::class,'setProtocolQuestions'])->name('set-protocol-questions');
    Route::post("create-protocol-questions",[AdminProtocolQuestionController::class,'store'])->name('create-protocol-questions');

    Route::get("list-static-pages",[AdminPageController::class,'index'])->name('list-static-pages');
    Route::post("save-static-pages",[AdminPageController::class,'store'])->name('save-static-pages');
    Route::get("edit-static-page",[AdminPageController::class,'edit'])->name('edit-static-page');
    Route::post("update-static-page",[AdminPageController::class,'update'])->name('update-static-page');
    Route::get("delete-static-page",[AdminPageController::class,'delete'])->name('delete-static-page');

    Route::get("admin-settings",[AdminController::class,'settings'])->name('admin-settings');
    Route::post("get-states",[AdminController::class,'getStates'])->name('get-states');
    Route::post("get-cities",[AdminController::class,'getCities'])->name('get-cities');
    Route::post("update-profile",[AdminController::class,'updateProfile'])->name('update-admin-profile');
    Route::post("delete-education",[AdminController::class,'deleteEducation'])->name('delete-education');
    Route::get("logout",[AdminController::class,'logout'])->name('admin-logout');

    /** Surgical section */
    Route::get("surgical-categories",[SurgicalCategoryController::class,'index'])->name('surgical-categories');
    Route::get("add-surgical-category",[SurgicalCategoryController::class,'add'])->name('add-surgical-category');
    Route::post("store-surgical-category",[SurgicalCategoryController::class,'store'])->name('store-surgical-category');
    Route::get("edit-surgical-category",[SurgicalCategoryController::class,'edit'])->name('edit-surgical-category');
    Route::post("update-surgical-category",[SurgicalCategoryController::class,'update'])->name('update-surgical-category');
    Route::get("delete-surgical-category",[SurgicalCategoryController::class,'delete'])->name('delete-surgical-category');
    /** Surgical section */

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

