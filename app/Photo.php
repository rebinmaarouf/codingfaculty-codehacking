<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $uploads = "/";
	
    protected $fillable = [
        'filee',
    ];

	public function  getFileeAttribute($value){
		return $this->uploads . $value;
	}  
	
}
