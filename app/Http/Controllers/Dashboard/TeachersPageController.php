<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeachersPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function main(){
        $courses = auth('teacher')->user()->courses;
        return view('dashboard.teacher_page.main',compact('courses'));
    }

    public function course(Request $request ,$id){
        $course = Course::find($id);
        foreach (auth('teacher')->user()->courses()->pluck('id') as $teacherCourse){
            if ($teacherCourse == $id){
                $users = $course->registeredUsers()->where('name','like','%'.$request->search.'%')->paginate(50);
                $allUsers = $course->registeredUsers()->get();
                return view('dashboard.teacher_page.course',compact('course','users','allUsers'));
            }
        }
        return redirect()->back();
    }
}
