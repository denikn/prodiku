<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $table='question_category';

    protected $hidden = [
        'id_category',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Users','nid','nid');
    }

    public function question_subject()
    {
    	return $this->hasMany('App\QuestionSubject','id_category','id_category');
    }

    public function reverseQuestionCategory()
    {
    	return $this->belongsTo('App\QuestionCategory','id_category','id_category');
    }
}
