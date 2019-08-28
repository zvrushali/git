<?php

<<<<<<< HEAD
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
=======

namespace App;


use Illuminate\Notifications\Notifiable;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\FileUpload;

class User extends Authenticatable
{
    use  Notifiable;
    use  HasRoles;


>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
   protected $dates = ['deleted_at'];
   protected $fillable = ['first_name','last_name','email','password','gender','google_id'];
=======
    protected $table ='users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
<<<<<<< HEAD
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



=======
   

     public function fileuploads()
    {
      return $this->hasOnce(FileUpload::class);
    }
}
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
