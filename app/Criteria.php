<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criteria';

    public function course()
    {
    	return $this->belongsTo('App\Course','id_course','id_course');
    }

    public function authorCriteria()
    {
    	return $this->hasMany('App\Users','nid','nid');
    }
}
