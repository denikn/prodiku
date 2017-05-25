<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'question_answer';

    protected $hidden = [
        'id_fill', 'id_answer', 'updated_at', 'created_at',
    ];

    protected $fillable = [
        'id_fill', 'choice', 'option', 'image',
    ];

    public function question_fill()
    {
    	return $this->belongsTo('App\QuestionFill','id_fill','id_fill');
    }

}
