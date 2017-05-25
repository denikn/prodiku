<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='user';

    protected $hidden=['password'];

    public function identity()
    {
    	return $this->hasMany('App\Identity','nid','nid');
    }

    public function question_category()
    {
    	return $this->hasMany('App\QuestionCategory','nid','nid');
    }

    public function criteria()
    {
        return $this->belongsTo('App\Criteria','nid','nid');
    }
}
