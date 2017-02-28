<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->softDeletes();
			$table->integer('enrollment_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}