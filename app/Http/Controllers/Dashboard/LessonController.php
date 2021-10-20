<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Http\Requests\TopicRequest;
use App\Lesson;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $lessons = Lesson::when($request->search, function ($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->latest()->paginate(50);

        return view('dashboard.lessons.index',compact('lessons'));
    }

    public function create($topic_id)
    {
        $topic = Topic::find($topic_id);
        return view('dashboard.lessons.create',compact('topic'));
    }

    public function store(LessonRequest $request)
    {
        $topic = Topic::find($request->topic_id);
//        $fileNameWithExt = $request->file('video')->getClientOriginalName();
//        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//        $extention = $request->file('video')->getClientOriginalExtension();
//        $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
//        Storage::disk('local')->putFileAs('videos', $request->file('video'),$fileNameToStore);

        $lesson = new Lesson();
        $lesson->name =$request->name;
        $lesson->topic()->associate($topic);
        $lesson->video = $request->video;
        $lesson->save();

        return redirect()->route('dashboard.lessons.index');
    }

    public function show($video)
    {
        return view('dashboard.video',compact('video'));
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('dashboard.lessons.edit',compact('lesson'));
    }

    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::find($id);
//        if ($request->hasFile('video')){
//            Storage::disk('local')->delete('videos/'.$lesson->video);
//            $fileNameWithExt = $request->file('video')->getClientOriginalName();
//            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//            $extention = $request->file('video')->getClientOriginalExtension();
//            $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
//            Storage::disk('local')->putFileAs('videos', $request->file('video'),$fileNameToStore);
//        }else{
//            $fileNameToStore = $lesson->video;
//        }

        $lesson->name = $request->name;
        $lesson->video = $request->video;
        $lesson->save();
        return redirect()->route('dashboard.lessons.index');
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('dashboard.lessons.index');
    }

//    public function get_video($video){
////        $path = "videos/{$video}";
//        $path = storage_path('app/videos/' . $video);
//        if (File::exists($path)){
////            $full_path = Storage::path($path);
////            $base64 = base64_encode(Storage::get($path));
////            $video_data = 'data:'.mime_content_type($full_path) . ';base64,' . $base64;
////            return view('dashboard.video',compact('video_data'));
//            $file = File::get($path);
//            $type = File::mimeType($path);
//            $response = Response::make($file, 200);
//            $response->header("Content-Type", $type);
////            return view('dashboard.video',compact('response'));
//            return $response;
//        }else{
//            abort(404);
//        }
//        return redirect()->route('dashboard.lessons.index');
//    }
}
