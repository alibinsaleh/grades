<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function grades()
    {
    	return $this->hasMany('App\Grade');
    }
}
