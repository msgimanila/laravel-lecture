<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnrollmentsTable extends Migration {

	public function up()
	{
		Schema::create('enrollments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('start_date');
			$table->datetime('end_date');
			$table->string('status')->default('???');
			$table->integer('course_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('payment_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('enrollments');
	}
}