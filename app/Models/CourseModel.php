<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
      protected $table = 'course';
	protected $guarded = [];

	 // public function getBookingDetails(){
  //       return $this->hasOne('App\Models\BookingDetails', 'id', 'booking_details_id');
  //   }
}
