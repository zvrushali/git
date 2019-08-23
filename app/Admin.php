<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable

{
	use Notifiable;
	protected $guard = 'admin';
	protected $table = 'admins';


     protected $fillable = [
        'name', 'email', 'password',
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];

    
}
