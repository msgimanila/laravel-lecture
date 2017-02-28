<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {

	protected $table = 'courses';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function lectures()
	{
		return $this->hasMany('Lecture');
	}

	public function enrollments()
	{
		return $this->belongsToMany('Enrollment');
	}
	public function testgate() {
	echo "gate success";
	}

}