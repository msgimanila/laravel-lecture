<?php

namespace App;
 
 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Coursemodule extends Model {

	protected $table = 'coursemodules';
	 
  public static function modules($id)
    {
        return DB::table('coursemodules')->where('course_id', $id)->orderBy('course_id')->get();
    }
}