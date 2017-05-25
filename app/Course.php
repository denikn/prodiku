<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function campus()
    {
    	return $this->belongsTo('App\Campus','id_campus','id_campus');
    }

    public function criteria()
    {
    	return $this->hasMany('App\Criteria','id_course','id_course');
    }

    public function choicecourse()
    {
    	return $this->belongsTo('App\ChoiceCourse','id_course','id_course');
    }

    public function scorecourse()
    {
        return $this->belongsTo('App\ScoreCourse','id_course','id_course');
    }

    public function getcampus()
    {
    	return $this->hasMany('App\Campus','id_campus','id_campus');
    }

    public function discuss()
    {
        return $this->hasMany('App\Discuss','id_course','id_course');
    }
}
