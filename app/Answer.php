<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['question_id','test_id','answer','is_correct'];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
