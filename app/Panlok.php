<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panlok extends Model
{
    public function campus()
    {
    	return $this->hasMany('App\Campus','id_panlok','id_panlok');
    }
}
