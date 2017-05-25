<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $table = 'trial';

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    protected $fillable = [
        'subject', 'keys', 'answ', 'nid',
    ];

    public function result()
    {
    	return $this->hasMany('App\Result','id_t','id_t');
    }
}
