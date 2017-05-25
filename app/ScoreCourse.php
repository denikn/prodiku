<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCourse extends Model
{
    protected $table = 'count_course';

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'id_course', 'score',
    ];

    public function campus()
    {
    	return $this->belongsTo('App\Course','id_course','id_course');
    }

    public function reverse_course()
    {
    	return $this->hasMany('App\Course','id_course','id_course');
    }
}
