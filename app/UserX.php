<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

	protected $table = 'users';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function enrollments()
	{
		return $this->hasMany('Enrollment');
	}

	public function payments()
	{
		return $this->hasMany('Payment');
	}

}