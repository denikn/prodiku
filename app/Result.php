<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'result';

    protected $hidden = [
        'id_t', 'updated_at', 'created_at', 'nid',
    ];

    protected $fillable = [
        'result', 'id_t', 'nid',
    ];

    public function trial()
    {
    	return $this->belongsTo('App\Trial','id_t','id_t');
    }
}
