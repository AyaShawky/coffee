<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function topics(){
        return $this->hasMany(Topic::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'course_user')->withPivot('active');
    }

    public function registeredUsers(){
        return $this->belongsToMany(User::class,'course_user')->wherePivot('active','=',1);
    }

    public function lessons(){
        return $this->hasManyThrough(Lesson::class,Topic::class);
    }
}
