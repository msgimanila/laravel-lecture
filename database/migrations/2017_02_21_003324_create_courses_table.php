<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('summary')->nullable();
			$table->text('description')->nullable();
			$table->string('target')->nullable();
			$table->tinyInteger('lecture_count')->unsigned()->nullable();
			$table->string('running_time')->nullable();
			$table->integer('price')->nullable();
			$table->boolean('free');
			$table->timestamps();
			$table->softDeletes();
			$table->text('feature')->nullable();
			$table->text('objective')->nullable();
			$table->string('course_url_name')->nullable();
			$table->boolean('available')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}