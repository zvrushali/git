<?php


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


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

     public function fileuploads()
    {
      return $this->hasOnce(FileUpload::class);
    }
}