<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacheUpdaterRequest;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $teachers = Teacher::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%')
                ->orWhere('bio','like','%'.$request->search.'%');
        })->latest()->paginate(50);
        return view('dashboard.teachers.index',compact('teachers'));
    }

    public function create()
    {
        return view('dashboard.teachers.create');
    }

    public function store(TeacherRequest $request)
    {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
        $path = $request->file('image')->storeAs('public/teacher_images',$fileNameToStore);


        $teacher = new Teacher();
        $teacher->name =$request->name;
        $teacher->email =$request->email;
        $teacher->password =bcrypt($request->password);
        $teacher->bio = $request->bio;
        $teacher->image = $fileNameToStore;
        $teacher->save();

        return redirect()->route('dashboard.teachers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('dashboard.teachers.edit',compact('teacher'));
    }

    public function update(TeacheUpdaterRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        if ($request->hasFile('image')){
            Storage::disk('local')->delete('public/teacher_images/'.$teacher->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
            $path = $request->file('image')->storeAs('public/teacher_images',$fileNameToStore);
        }else{
            $fileNameToStore = $teacher->image;
        }

        $teacher->name =$request->name;
        $teacher->email =$request->email;
        $teacher->bio = $request->bio;
        $teacher->image = $fileNameToStore;
        $teacher->save();

        return redirect()->route('dashboard.teachers.index');

    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('dashboard.teachers.index');
    }

    public function reset_password(PasswordResetRequest $request , $id){
        $teacher = Teacher::find($id);
        $teacher->password = bcrypt($request->password);
        $teacher->save();
        return redirect()->route('dashboard.teachers.index')->with('success','تم تغير كلمة السر بنجاح');
    }
}
