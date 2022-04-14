<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperModel extends Model
{
     protected $table = 'papers';
	protected $guarded = [];

	public function getSubjectDetails(){
        return $this->hasOne('App\Models\SubjectModel', 'id', 'subject_id');
    }


     public function getUserDetails(){
        return $this->hasOne('App\User', 'id', 'customer_id');
    }

}
