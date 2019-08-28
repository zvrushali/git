<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany ;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class Payment extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];
     protected $fillable = [
        'stripe_cid','user_id','card_last4_digit'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
