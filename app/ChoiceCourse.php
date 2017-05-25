<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoiceCourse extends Model
{
    protected $table = 'choice_course';

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'id_course', 'nid', 'choice',
    ];

    public function course()
    {
    	return $this->hasMany('App\Course','id_course','id_course');
    }

    public function reverse_campus()
    {
    	return $this->hasMany('App\Campus','id_campus','id_campus');
    }
}
