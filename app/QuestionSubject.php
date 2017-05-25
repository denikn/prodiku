<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSubject extends Model
{
	protected $table = 'question_subject';

	protected $hidden = [
        'id_subject', 'id_category',
    ];

    public function question_category()
    {
    	return $this->belongsTo('App\QuestionCategory','id_category','id_category');
    }

    public function question_fill()
    {
    	return $this->hasMany('App\QuestionFill','id_subject','id_subject');
    }

    public function reverseQuestionFill()
    {
    	return $this->belongsTo('App\QuestionFill','subject','subject');
    }

    public function reverseQuestionCategory()
    {
    	return $this->hasMany('App\QuestionCategory', 'id_category', 'id_category');
    }
}
