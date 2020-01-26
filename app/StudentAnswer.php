<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    public $table = 'student_answers';
    protected $fillable =['user_id','test_id','answer_id','question_id','answer','is_checked'];
}
