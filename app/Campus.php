<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    public function course()
    {
    	return $this->hasMany('App\Course','id_campus','id_campus');
    }

    public function panlok()
    {
    	return $this->belongsTo('App\Panlok','id_panlok','id_panlok');
    }

    public function count_course()
    {
    	return $this->hasMany('App\CountCourse','id_campus','id_campus');	
    }

    public function discuss()
    {
        return $this->hasMany('App\Discuss','id_course','id_course');
    }
}
