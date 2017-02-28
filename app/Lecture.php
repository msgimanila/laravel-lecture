<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model {

	protected $table = 'lectures';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function course()
	{
		return $this->belongsTo('Course', 'course_id');
	}

}