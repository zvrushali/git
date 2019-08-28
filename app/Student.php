<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{   
    use HasApiTokens;
	use Notifiable;
	use SoftDeletes;
     protected $table = "students";
     protected $dates = ['deleted_at'];
     protected $guard ='api';
     protected $fillable = ['first_name','last_name','email','password','gender'];
     protected $hidden = [
      'password'
];
}
