<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =['name','count_of_students','subject','students','teacher_id'];
}
