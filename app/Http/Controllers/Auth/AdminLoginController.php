<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('dashboard.auth.admin-login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
            return redirect()->route('dashboard.main');
        }

        $request->session()->flash('message', 'معلومات تسجيل الدخول غير صحيحة');
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
