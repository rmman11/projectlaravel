<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    'student_name',
    'student_address',
    'student_state',
    'student_zip',
    'student_age'
];
}
