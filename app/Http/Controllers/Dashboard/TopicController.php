<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\TopicRequest;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $topics = Topic::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->when($request->course_id,function ($query) use ($request){
            return $query->where('course_id',$request->course_id);
        })->latest()->paginate(50);

        $courses = Course::all();
        return view('dashboard.topics.index',compact('topics','courses'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('dashboard.topics.create',compact('courses'));
    }

    public function store(TopicRequest $request)
    {
        $course = Course::find($request->course_id);

        $topic = new Topic();
        $topic->name =$request->name;
        $topic->course()->associate($course);
        $topic->save();

        return redirect()->route('dashboard.topics.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $topic = Topic::find($id);
        $courses = Course::all();
        return view('dashboard.topics.edit',compact('topic','courses'));
    }

    public function update(TopicRequest $request, $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->course_id = $request->course_id;
        $topic->save();
        return redirect()->route('dashboard.topics.index');
    }

    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->route('dashboard.topics.index');
    }
}
