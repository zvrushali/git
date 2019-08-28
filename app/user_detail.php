<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Result;
class user_detail extends Model
{
	use HasApiTokens;
	use Notifiable;
    use SoftDeletes;
       protected $guard = 'api';
       protected $table = "user_details";
       protected $dates = ['deleted_at'];
       protected $fillable = ['first_name','last_name','email','password','gender'];
       protected $hidden = [
      'password', 'remember_token',
];

 public function result()
    {
    	return $this->belongsTo('App\Result');
    }
}
?>
