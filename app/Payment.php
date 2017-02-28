<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model {

	protected $table = 'payments';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function enrollment()
	{
		return $this->belongsTo('Enrollment', 'enrollment_id');
	}

}