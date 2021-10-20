<?php

use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('videos/{video}','Dashboard\LessonController@get_video')->name('get_video');
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//jjj//
Route::get('/video', function () {
   return view('front.video');
});

Route::prefix('dashboard')->name('dashboard.')->group(function (){
//    Route::get('/blank',function (){
//        return view('dashboard.app');
//    })->name('blank')->middleware('auth:admin');

    Route::get('/main','Dashboard\DashboardController@index')->name('main');
    Route::post('/accept','Dashboard\DashboardController@accept')->name('accept');
    Route::post('/refuse','Dashboard\DashboardController@refuse')->name('refuse');
    Route::post('/expel','Dashboard\DashboardController@expel')->name('expel');

    Route::resource('sections','Dashboard\SectionController')->except('show');
    Route::resource('teachers','Dashboard\TeacherController')->except('show');
    Route::post('/teacher-password-reset/{id}','Dashboard\TeacherController@reset_password')->name('teachers.password.update');
    Route::resource('admins','Dashboard\AdminController')->except('show');
    Route::post('/admin-password-reset/{id}','Dashboard\AdminController@reset_password')->name('admins.password.update');
    Route::resource('users','Dashboard\UserController')->except('show');
    Route::post('/user-password-reset/{id}','Dashboard\UserController@reset_password')->name('users.password.update');
    Route::resource('courses','Dashboard\CourseController')->except('show');
    Route::resource('topics','Dashboard\TopicController')->except('show');
    Route::resource('lessons','Dashboard\LessonController')->except('create');
    Route::get('/lessons/create/{topic_id}','Dashboard\LessonController@create')->name('lessons.create');
    Route::resource('orders','Dashboard\OrderController');


    Route::get('/trash','Dashboard\TrashController@index')->name('trash.index');
    Route::delete('delete/admin/{id}','Dashboard\TrashController@delete_admin')->name('delete.admin');
    Route::delete('delete/user/{id}','Dashboard\TrashController@delete_user')->name('delete.user');
    Route::delete('delete/course/{id}','Dashboard\TrashController@delete_course')->name('delete.course');
    Route::delete('delete/lesson/{id}','Dashboard\TrashController@delete_lesson')->name('delete.lesson');
    Route::delete('delete/section/{id}','Dashboard\TrashController@delete_section')->name('delete.section');
    Route::delete('delete/teacher/{id}','Dashboard\TrashController@delete_teacher')->name('delete.teacher');
    Route::delete('delete/topic/{id}','Dashboard\TrashController@delete_topic')->name('delete.topic');

    Route::get('restore/admin/{id}','Dashboard\TrashController@restore_admin')->name('restore.admin');
    Route::get('restore/user/{id}','Dashboard\TrashController@restore_user')->name('restore.user');
    Route::get('restore/course/{id}','Dashboard\TrashController@restore_course')->name('restore.course');
    Route::get('restore/lesson/{id}','Dashboard\TrashController@restore_lesson')->name('restore.lesson');
    Route::get('restore/section/{id}','Dashboard\TrashController@restore_section')->name('restore.section');
    Route::get('restore/teacher/{id}','Dashboard\TrashController@restore_teacher')->name('restore.teacher');
    Route::get('restore/topic/{id}','Dashboard\TrashController@restore_topic')->name('restore.topic');

    Route::prefix('teachers')->name('teachers.')->group(function (){
        Route::get('main','Dashboard\TeachersPageController@main')->name('main');
        Route::get('course/{id}','Dashboard\TeachersPageController@course')->name('course');
    });
});

Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('/admin-login','Auth\AdminLoginController@showLoginForm')->name('admin_login');
    Route::post('/admin-login','Auth\AdminLoginController@login')->name('admin_login.submit');
    Route::get('/admin-logout','Auth\AdminLoginController@logout')->name('admin_logout');

    Route::get('/teacher-login','Auth\TeacherLoginController@showLoginForm')->name('teacher_login');
    Route::post('/teacher-login','Auth\TeacherLoginController@login')->name('teacher_login.submit');
    Route::get('/teacher-logout','Auth\TeacherLoginController@logout')->name('teacher_logout');

    Route::get('/student-register','Auth\StudentLoginController@showRegisterForm')->name('student_register');
    Route::post('/student-register','Auth\StudentLoginController@register')->name('student_register.submit');
    Route::get('/student-login','Auth\StudentLoginController@showLoginForm')->name('student_login');
    Route::post('/student-login','Auth\StudentLoginController@login')->name('student_login.submit');
    Route::get('/student-logout','Auth\StudentLoginController@logout')->name('student_logout');
});

Route::prefix('')->name('front.')->group(function (){
   Route::get('/','Front\PageController@index')->name('index');
   Route::get('/about','Front\PageController@about')->name('about');
   Route::get('/teachers','Front\PageController@teachers')->name('teachers');
   Route::get('/courses','Front\PageController@courses')->name('courses');
   Route::get('/course/{course_id}','Front\PageController@courseDetail')->name('courseDetail');

   Route::get('/profile','Front\StudentController@profile')->name('student_profile');
   Route::get('/myCourses','Front\StudentController@myCourses')->name('myCourses');
   Route::get('/password-update','Front\StudentController@showResetForm')->name('student_password_update');
   Route::post('/password-update','Front\StudentController@updatePassword')->name('student_password_update');
   Route::put('/profile-update','Front\StudentController@updateProfile')->name('student_profile_update');
   Route::get('/apply/{course_id}','Front\StudentController@applyForCourse')->name('apply');
   Route::get('course/{course_id}/lesson/{lesson_id}','Front\StudentController@getLesson')->name('get_lesson');
   Route::get('/chat','Front\StudentController@chat')->name('chat');

});



Auth::routes();
Route::get('/login','Auth\StudentLoginController@showLoginForm')->name('login');
Route::get('/password/reset','Front\StudentController@showResetForm');
Route::get('/register','Auth\StudentLoginController@showRegisterForm')->name('register');
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('jawwalAccept',[Payment::class,'jawwalAccept'])->middleware('auth');
Route::get('pay/{id}',[Payment::class,'auth'])->name('auth')->middleware('auth');

// Route::post('storePay',[PageController::class,'storePay'])->name('storePay');



