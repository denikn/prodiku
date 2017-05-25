<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table='offer';

    protected $fillable = [
        'sender', 'to', 'type_offer', 'offer', 'image',
    ];

    public function identity()
    {
    	return $this->belongsTo('App\Identity','sender','nid');
    }

	public function reverse_identity()
    {
    	return $this->hasMany('App\Identity','nid','sender');
    }    

}
