<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdereModel extends Model
{
      protected $table = 'payment';
	protected $guarded = [];


     public function getUserDetails(){
        return $this->hasOne('App\User', 'id', 'customer_id');
    }
}
