<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $fillable = [
        'user_id', 'department_id'
    ];
}
