<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table = 'subjects';
	protected $guarded = [];

	     public function getCourseDetails(){
        return $this->hasOne('App\Models\CourseModel', 'id', 'course_id');
    }
}
