<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestService extends Model
{
    public $table = 'test_service';
    protected $fillable =['test_id','duration','percentage','expiration','activate_for'];
}
