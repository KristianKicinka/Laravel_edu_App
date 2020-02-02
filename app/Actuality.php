<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    public $table = 'actuality';
    protected $fillable=['title','description','filename','original_filename','author'];
}
