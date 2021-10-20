<?php

namespace App\Http\Livewire;

use App\Message;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherChat extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $course;
    public $clicked_user = null;
    public $users = '';
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


    public function getUserMessages($user_id){
        $user = User::find($user_id);
        $this->clicked_user = $user;
        $unseen_messages = $user->messagesSent()->where('teacher_id',auth('teacher')->user()->id)->where('seen_at',null)->get();
        foreach ($unseen_messages as $unseen_message){
            $unseen_message->seen_at = now();
            $unseen_message->save();
        }
        $this->amount =100;
    }

    public function sendMessage(){
        $this->validate();
        $teacher = auth('teacher')->user();
        $teacher->messagesSent()->create([
           'user_id'=>$this->clicked_user->id,
           'teacher_id'=>$teacher->id,
            'message'=>$this->messageText,
        ]);

        $this->reset('messageText');
    }

    public function render()
    {
        $clicked_user = $this->clicked_user;

        if ($clicked_user != null){
            $user = User::find($clicked_user->id);
            $this->messages = $user->messages()->where('teacher_id',auth('teacher')->user()->id)->orderBy('created_at','desc')->take($this->amount)->get();
            $unseen_messages = $user->messagesSent()->where('teacher_id',auth('teacher')->user()->id)->where('seen_at',null)->get();
            foreach ($unseen_messages as $unseen_message){
                $unseen_message->seen_at = now();
                $unseen_message->save();
            }
        }

        $course = $this->course;
        $users = $this->users;
        $messages = $this->messages;
        return view('livewire.teacher-chat',compact('course','users','messages','clicked_user'));
    }

}
