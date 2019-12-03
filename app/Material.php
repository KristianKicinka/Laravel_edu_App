<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
   protected $fillable =['title','content','subject','class','filename','original_filename','author'];
}
