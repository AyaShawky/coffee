<?php

namespace App\Http\Livewire;

use App\Teacher;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudentChat extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $clicked_user = null;
    public $teachers = '';
    protected $messages = [];
    public $messageText;
    public $amount = 100;


    protected $rules = [
        'messageText' => 'required|max:999|string',
    ];


    protected $listeners = ['loadMore'];

    public function loadMore()
    {
        $this->amount +=10;
    }


    public function getTeacherMessages($teacher_id){
        $teacher = Teacher::find($teacher_id);
        $this->clicked_user = $teacher;
        $unseen_messages = $teacher->messagesSent()->where('user_id',auth('web')->user()->id)->where('seen_at',null)->get();
        foreach ($unseen_messages as $unseen_message){
            $unseen_message->seen_at = now();
            $unseen_message->save();
        }
        $this->amount =100;
    }

    public function sendMessage(){
        $this->validate();
        $user = auth('web')->user();
        $user->messagesSent()->create([
            'user_id'=>$user->id,
            'teacher_id'=>$this->clicked_user->id,
            'message'=>$this->messageText,
        ]);

        $this->reset('messageText');
    }

    public function render()
    {
        $clicked_user = $this->clicked_user;

        if ($clicked_user != null){
            $teacher = Teacher::find($clicked_user->id);
            $this->messages = $teacher->messages()->where('user_id',auth('web')->user()->id)->orderBy('created_at','desc')->take($this->amount)->get();
            $unseen_messages = $teacher->messagesSent()->where('user_id',auth('web')->user()->id)->where('seen_at',null)->get();
            foreach ($unseen_messages as $unseen_message){
                $unseen_message->seen_at = now();
                $unseen_message->save();
            }
        }

        $teachers = $this->teachers;
        $messages = $this->messages;
        return view('livewire.student-chat',compact('teachers','messages','clicked_user'));
    }

}
