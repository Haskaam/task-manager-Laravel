<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
