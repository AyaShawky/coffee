<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest')->except('logout');
    }

    public function showRegisterForm(){
        return view('front.register');
    }

    public function register(UserRequest $request){
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->mobile_number =$request->mobile_number;
        $user->gpa =$request->gpa;
        $user->school =$request->school;
        $user->address =$request->address;
        $user->password =bcrypt($request->password);
        $user->save();

        if (Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect()->route('front.courses');
        }

        return redirect()->route('auth.student_login');
    }

    public function showLoginForm(){
        return view('front.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect()->route('front.myCourses');
        }

        $request->session()->flash('message', 'معلومات تسجيل الدخول غير صحيحة');
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
