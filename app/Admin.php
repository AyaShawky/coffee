<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable , SoftDeletes;

    protected $guard = 'admin';
    protected $guarded = [] ;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
