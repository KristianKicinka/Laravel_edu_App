<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable =['user_id','test_id','points','max_points','percentage'];
}
