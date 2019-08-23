<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use User;
use Question;
class Result extends Model
{
    use SoftDeletes;
   protected $dates = ['deleted_at'];
   protected $fillable = ['user_id','questions_id','category_id','correct_ans','user_ans'];

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
     public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

