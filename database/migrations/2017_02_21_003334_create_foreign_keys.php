<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('enrollment_id')->references('id')->on('enrollments')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->foreign('payment_id')->references('id')->on('payments')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_user_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_enrollment_id_foreign');
		});
		Schema::table('lectures', function(Blueprint $table) {
			$table->dropForeign('lectures_course_id_foreign');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->dropForeign('enrollments_course_id_foreign');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->dropForeign('enrollments_user_id_foreign');
		});
		Schema::table('enrollments', function(Blueprint $table) {
			$table->dropForeign('enrollments_payment_id_foreign');
		});
	}
}