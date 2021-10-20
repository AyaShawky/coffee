<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Order;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        $students = User::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('mobile_number','like','%'.$request->search.'%')
                ->orWhere('gpa','like','%'.$request->search.'%')
                ->orWhere('school','like','%'.$request->search.'%')
                ->orWhere('address','like','%'.$request->search.'%');
        })->latest()->paginate(50);

        $users = User::count();
        $teachers = Teacher::count();
        $courses = Course::count();
        $lessons = Lesson::count();

        return view('dashboard.main',compact('users','teachers','courses','lessons','students'));
    }

    public function accept(Request $request){
        $user = User::find($request->user_id);
        $courses = $user->courses;
        foreach ($courses as $course){
            if ($course->id == $request->course_id){
                $user->courses()->updateExistingPivot($course, array('active' => 1), false);

                $order = new Order();
                $order->course_name = $course->name;
                $order->student_name = $user->name;
                $order->amount = $course->price;
                $order->address = $user->address;
                $order->type = 'offline';
                $order->save();

                return redirect()->back()->with('success','تم قبول الطالب بنجاح');
            }
        }
        return redirect()->back()->with('error','حدث خطأ في معالجة الطلب');
    }

    public function refuse(Request $request){
        $user = User::find($request->user_id);
        $user->courses()->detach($request->course_id);
        return redirect()->back()->with('success','تم رفض الطالب بنجاح');
    }

    public function expel(Request $request){
        $user = User::find($request->user_id);
        $courses = $user->courses;
        foreach ($courses as $course){
            if ($course->id == $request->course_id){
                $user->courses()->updateExistingPivot($course, array('active' => 0), false);
                return redirect()->back()->with('success','تم فصل الطالب بنجاح');
            }
        }
        return redirect()->back()->with('error','حدث خطأ في معالجة الطلب');
    }

}
