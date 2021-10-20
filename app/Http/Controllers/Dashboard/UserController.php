<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        $users = User::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('mobile_number','like','%'.$request->search.'%')
                ->orWhere('gpa','like','%'.$request->search.'%')
                ->orWhere('school','like','%'.$request->search.'%')
                ->orWhere('address','like','%'.$request->search.'%');
        })->latest()->paginate(50);
        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->mobile_number =$request->mobile_number;
        $user->gpa =$request->gpa;
        $user->school =$request->school;
        $user->address =$request->address;
        $user->password =bcrypt($request->password);
        $user->save();

        return redirect()->route('dashboard.users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->mobile_number =$request->mobile_number;
        $user->gpa =$request->gpa;
        $user->school =$request->school;
        $user->address =$request->address;
        $user->save();

        return redirect()->route('dashboard.users.index');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }

    public function reset_password(PasswordResetRequest $request , $id){
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('dashboard.users.index')->with('success','تم تغير كلمة السر بنجاح');
    }
}
