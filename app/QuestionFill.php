<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionFill extends Model
{
    protected $table = 'question_fill';

    protected $hidden = [
        'id_subject', 'subject', 'created_at', 'updated_at',
    ];

    protected $fillable = [
        'subject', 'type', 'key', 'question', 'image', 'nid',
    ];

    public function question_subject()
    {
    	return $this->belongsTo('App\QuestionSubject','id_subject','id_subject');
    }

    public function question_answer()
    {
    	return $this->hasMany('App\QuestionAnswer','id_fill','id_fill');
    }

    public function reverseQuestionSubject()
    {
    	return $this->hasMany('App\QuestionSubject', 'subject', 'subject');
    }
}
