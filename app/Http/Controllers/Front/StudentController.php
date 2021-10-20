<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Lesson;
use App\Order;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function profile(){
        return view('front.student-profile');
    }

    public function showResetForm(){
        return view('front.password-reset');
    }

    public function updatePassword(Request $request){
        $messages = [
            'old_password.required' => 'لم يتم ادخال كلمة السر القديمة',
            'password.required' => 'لم يتم ادخال كلمة السر الجديدة',
            'password.min' => 'كلمة السر يجب ان تتكون من 8 حروف على الاقل',
            'password.max' => 'تجاوز طول كلمة السر عدد الحروف المسموحة',
            'password.confirmed' => 'تأكيد كلمة السر خطأ',
        ];

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:8|max:200|confirmed',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->with('errors',$validator->messages());
        }

        $user = auth('web')->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password'=>bcrypt($request->password)
            ]);
            return redirect()->route('front.student_profile')->with('success','تم تغير كلمة المرور بنجاح');
        }else{
            return redirect()->back()->with('errors','كلمة المرور القديمة خاطئة');
        }
    }

    public function updateProfile(UserUpdateRequest $request){
        $user = auth('web')->user();

        if ($request->hasFile('image')){
            Storage::disk('local')->delete('public/student_images/'.$user->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
            $path = $request->file('image')->storeAs('public/student_images',$fileNameToStore);
        }else{
            $fileNameToStore = $user->image;
        }

        $user->name =$request->name;
        $user->image = $fileNameToStore;
        $user->email =$request->email;
        $user->mobile_number =$request->mobile_number;
        $user->gpa =$request->gpa;
        $user->school =$request->school;
        $user->address =$request->address;
        $user->password =bcrypt($request->password);
        $user->save();

        return redirect()->route('front.student_profile')->with('success','تم تحديث معلومات الطالب بنجاح');
    }

    public function applyForCourse($course_id){
        $user = auth('web')->user();
        $course = Course::find($course_id);
        $registeredCourses = $user->courses;
        foreach ($registeredCourses as $registeredCourse){
            if ($registeredCourse->id == $course_id){
                return redirect()->back();
            }
        }
        $user->courses()->attach($course);

        return view('front.application-success');
    }

    public function getLesson($course_id,$lesson_id){
        $lesson = Lesson::find($lesson_id);
        $course = Course::find($course_id);
        if (auth('web')->check()){
            $userCourses = auth('web')->user()->registeredCourses;
            foreach ($userCourses as $userCourse){
                if ($userCourse->id == $course_id){
                    return view('front.lesson-page',compact('lesson','course'));
                }
            }
        }
    }

    public function myCourses(){
        return view('front.myCourses');
    }

    public function chat(){
        $user = auth('web')->user();
        $teachers = new Collection();

        foreach ($user->registeredCourses as $course){
            $teachers->push($course->teacher);
        }

        return view('front.chat',compact('teachers'));
    }
}
