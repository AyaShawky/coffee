<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        $admins = Admin::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%');
        })->latest()->paginate(50);
        return view('dashboard.admins.index',compact('admins'));
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(AdminRequest $request)
    {

        $admin = new Admin();
        $admin->name =$request->name;
        $admin->email =$request->email;
        $admin->password =bcrypt($request->password);
        $admin->save();

        return redirect()->route('dashboard.admins.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('dashboard.admins.edit',compact('admin'));
    }

    public function update(AdminUpdateRequest $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name =$request->name;
        $admin->email =$request->email;
        $admin->save();

        return redirect()->route('dashboard.admins.index');

    }

    public function destroy($id)
    {
        if ($id == 1){
            return redirect()->back()->with('errors','لا يمكن حذف حساب المشرف الاساسي');
        } else{
            $admin = Admin::find($id);
            $admin->delete();
        }
        return redirect()->route('dashboard.admins.index');
    }

    public function reset_password(PasswordResetRequest $request , $id){
        $admin = Admin::find($id);
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('dashboard.admins.index')->with('success','تم تغير كلمة السر بنجاح');
    }
}