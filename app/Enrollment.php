<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model {

	protected $table = 'enrollments';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function course()
	{
		return $this->hasOne('Course', 'course_id');
	}

	public function payment()
	{
		return $this->hasOne('Payment', 'payment_id');
	}

}