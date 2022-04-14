<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    //
     protected $table = 'promo_code_master';
	protected $guarded = [];

	 public function getUserDetails(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
