<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturesTable extends Migration {

	public function up()
	{
		Schema::create('lectures', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order')->unsigned();
			$table->string('title');
			$table->text('description')->nullable();
			$table->string('URL')->nullable();
			$table->timestamps();
			$table->integer('course_id')->unsigned();
			$table->softDeletes();
			$table->boolean('sample')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('lectures');
	}
}