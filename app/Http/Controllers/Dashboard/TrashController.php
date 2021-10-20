<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Section;
use App\Teacher;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $admins = Admin::onlyTrashed()->get();
        $users = User::onlyTrashed()->get();
        $courses = Course::onlyTrashed()->get();
        $lessons = Lesson::onlyTrashed()->get();
        $sections = Section::onlyTrashed()->get();
        $teachers = Teacher::onlyTrashed()->get();
        $topics = Topic::onlyTrashed()->get();

        return view('dashboard.trash',compact('admins','users','courses','lessons','sections','teachers','topics'));
    }

    public function delete_admin($id){
        if ($id == 1){
            return redirect()->back()->with('errors','لا يمكن حذف حساب المشرف الاساسي');
        } else{
            $admin = Admin::onlyTrashed()->where('id', $id)->firstOrFail();
            $admin->forceDelete();
        }
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_user($id){
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();
        $user->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_course($id){
        $course = Course::onlyTrashed()->where('id', $id)->firstOrFail();
        Storage::disk('local')->delete('public/course_images/'.$course->image);
        $course->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_lesson($id){
        $lesson = Lesson::onlyTrashed()->where('id', $id)->firstOrFail();
        Storage::disk('local')->delete('videos/'.$lesson->video);
        $lesson->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_section($id){
        $section = Section::onlyTrashed()->where('id', $id)->firstOrFail();
        Storage::disk('local')->delete('public/section_images/'.$section->image);
        $section->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_teacher($id){
        $teacher = Teacher::onlyTrashed()->where('id', $id)->firstOrFail();
        Storage::disk('local')->delete('public/teacher_images/'.$teacher->image);
        $teacher->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }
    public function delete_topic($id){
        $topic = Topic::onlyTrashed()->where('id', $id)->firstOrFail();
        $topic->forceDelete();
        return redirect()->route('dashboard.trash.index');
    }


    public function restore_admin($id){
        $admin = Admin::onlyTrashed()->where('id', $id)->firstOrFail();
        $admin->restore();
        return redirect()->route('dashboard.admins.index');
    }
    public function restore_user($id){
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();
        $user->restore();
        return redirect()->route('dashboard.users.index');
    }
    public function restore_course($id){
        $course = Course::onlyTrashed()->where('id', $id)->firstOrFail();
        $course->restore();
        return redirect()->route('dashboard.courses.index');
    }
    public function restore_lesson($id){
        $lesson = Lesson::onlyTrashed()->where('id', $id)->firstOrFail();
        $lesson->restore();
        return redirect()->route('dashboard.lessons.index');

    }
    public function restore_section($id){
        $section = Section::onlyTrashed()->where('id', $id)->firstOrFail();
        $section->restore();
        return redirect()->route('dashboard.sections.index');

    }
    public function restore_teacher($id){
        $teacher = Teacher::onlyTrashed()->where('id', $id)->firstOrFail();
        $teacher->restore();
        return redirect()->route('dashboard.teachers.index');

    }
    public function restore_topic($id){
        $topic = Topic::onlyTrashed()->where('id', $id)->firstOrFail();
        $topic->restore();
        return redirect()->route('dashboard.topics.index');
    }
}
