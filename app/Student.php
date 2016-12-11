<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function grades()
    {
    	return $this->hasOne('App\Grade');
    }

    public function courses()
    {
    	return $this->hasMany('App\Course');
    }

    public function behaviours()
    {
    	return $this->hasMany('App\Behaviour');
    }

    public function shorttheory()
    {
    	return $this->hasOne('App\ShortTheory');
    }

    public function shortpractical()
    {
    	return $this->hasOne('App\ShortPractical');
    }
}
