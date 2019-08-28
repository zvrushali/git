<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany ;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Question;
class Category extends Model
{
	 use SoftDeletes;
     protected $dates = ['deleted_at'];
     protected $fillable = [
        'name'
    ];


    public function questions()
    {
    	return $this->hasMany('App\Question');
    }
}
