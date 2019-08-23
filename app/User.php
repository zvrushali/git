<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Result;
use Illuminate\Notifications\RoutesNotifications;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;
     use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $dates = ['deleted_at'];
   protected $fillable = ['first_name','last_name','email','password','gender','google_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',];

     public function is_admin()
    {
        if($this->role==1 || $this->role==0)
        {
            return true;
        }
        return false;
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }

    public function addNew($input)

    {

        $check = static::where('google_id',$input['google_id'])->first();



        if(is_null($check)){

            return static::create($input);

        }



        return $check;

    }

}



