<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
	public function categories(){

    	return $this->belongsTo(Category::class);
    }
	public function posts(){

    	return $this->hasMany(Post::class);
    }
}
