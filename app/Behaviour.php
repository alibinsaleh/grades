<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behaviour extends Model
{
    public function student()
    {
    	return $this->belongsTo('App\Student');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
}
