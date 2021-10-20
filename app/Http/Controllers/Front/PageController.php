<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Section;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(){
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('front.index',compact('sections','teachers'));
    }

    public function about(){
        $lessons = Lesson::count();
        $users = User::count();
        $teachers = Teacher::count();
        $courses = Course::count();
        return view('front.about',compact('lessons','teachers','users','courses'));
    }

    public function teachers(){
        $teachers = Teacher::all();
        return view('front.teachers',compact('teachers'));
    }

    public function courses(Request $request){
        $courses = Course::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->when($request->section_id,function ($query) use ($request){
            return $query->where('section_id',$request->section_id);
        })->latest()->get();

        return view('front.courses',compact('courses'));
    }

    public function courseDetail($course_id){
        $course = Course::find($course_id);
        if (auth('web')->check()){
            $userCourses = auth('web')->user()->registeredCourses;
            foreach ($userCourses as $userCourse){
                if ($userCourse->id == $course_id){
                    return view('front.course-page',compact('course'));
                }
            }
        }
        return view('front.course-detail',compact('course'));
    }


    public function pay()
    {
      return view('front.pay');

    }

    public function storePay(Request $request)
    {

         Http::post('https://accept.paymobsolutions.com/api/auth/tokens', [

            "username" =>"test",
            "password" =>"test"

        ]);


    }
}
