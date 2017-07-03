<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'desc', 'image_url', 'rating'
    ];

    public function shops()
    {
    	return $this->belongsToMany('App\Shop');
    }
}
