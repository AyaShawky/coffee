<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable , SoftDeletes;

    protected $guard = 'teacher';
    protected $guarded = [] ;
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function messages(){
        return $this->hasMany(Message::class,'teacher_id');
    }

    public function messagesSent(){
        return $this->morphMany(Message::class,'messagable');
    }
}
