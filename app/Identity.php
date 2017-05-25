<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table='identity';
    
    protected $fillable =[
    	'nid', 'name', 'sex', 'address',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Users','nid','nid');
    }

    public function offer()
    {
        return $this->hasMany('App\Offer', 'nid', 'nid');
    }

    public function next_offer()
    {
        return $this->belongsTo('App\Offer', 'nid', 'nid');
    }
}
