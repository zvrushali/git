<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class FileUpload extends Model

{
    use SoftDeletes;
    protected $dates = ['deleted_at'];  

     public function users()
    {
      return $this->belongsTo(User::class);
    }
}
