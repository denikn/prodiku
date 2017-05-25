<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    protected $table = 'discuss';

    protected $fillable = [
        'id_discuss', 'comment', 'id_course', 'id_campus', 'nid', 'updated_at', 'created_at',
    ];

    public function fromcourse()
    {
    	return $this->belongsTo('App\Course','id_course','id_course');
    }

    public function fromcampus()
    {
    	return $this->belongsTo('App\Course','id_campus','id_campus');	
    }
}
