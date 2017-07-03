<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
    	'name', 'email', 'address', 'contact', 'desc',
    	'website'
    ];

    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }
}
