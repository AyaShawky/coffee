<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Section;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $courses = Course::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                ->orWhere('description','like','%'.$request->search.'%');
        })->latest()->paginate(50);
        return view('dashboard.courses.index',compact('courses'));
    }

    public function create()
    {
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('dashboard.courses.create',compact('sections','teachers'));
    }


    public function store(CourseRequest $request)
    {
//        $fileNameWithExt = $request->file('preview_video')->getClientOriginalName();
//        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//        $extention = $request->file('preview_video')->getClientOriginalExtension();
//        $video_name = $fileName.'_' .time(). '.' .$extention;
//        $path = $request->file('preview_video')->storeAs('public/preview_videos',$video_name);


        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extention = $request->file('image')->getClientOriginalExtension();
        $image_name = $fileName.'_' .time(). '.' .$extention;
        $path = $request->file('image')->storeAs('public/course_images',$image_name);

        $course_section = Section::find($request->section_id);
        $course_teacher = Teacher::find($request->teacher_id);

        $course = new Course();
        $course->name =$request->name;
        $course->price =$request->price;
        $course->section()->associate($course_section);
        $course->teacher()->associate($course_teacher);
        $course->description = $request->description;
        $course->image = $image_name;
        $course->preview_video = $request->preview_video;
        $course->save();

        return redirect()->route('dashboard.courses.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sections = Section::all();
        $teachers = Teacher::all();
        $course = Course::find($id);
        return view('dashboard.courses.edit',compact('sections','teachers','course'));
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $course = Course::find($id);

//        if ($request->hasFile('preview_video')){
//            Storage::disk('local')->delete('public/preview_videos/'.$course->preview_video);
//            $fileNameWithExt = $request->file('preview_video')->getClientOriginalName();
//            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//            $extention = $request->file('preview_video')->getClientOriginalExtension();
//            $video_name = $fileName.'_' .time(). '.' .$extention;
//            $path = $request->file('preview_video')->storeAs('public/preview_videos',$video_name);
//        }else{
//            $video_name = $course->preview_video;
//        }

        if ($request->hasFile('image')){
            Storage::disk('local')->delete('public/course_images/'.$course->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $image_name = $fileName.'_' .time(). '.' .$extention;
            $path = $request->file('image')->storeAs('public/course_images',$image_name);
        }else{
            $image_name = $course->image;
        }

        $course->name =$request->name;
        $course->price =$request->price;
        $course->section_id = $request->section_id;
        $course->teacher_id = $request->teacher_id;
        $course->description = $request->description;
        $course->image = $image_name;
        $course->preview_video = $request->preview_video;

        $course->save();
        return redirect()->route('dashboard.courses.index');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('dashboard.courses.index');
    }
}
