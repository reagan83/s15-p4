<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create tasks table
		Schema::create('tasks', function($table) {
			$table->increments('id');
			$table->string('taskname', 50);
			$table->string('notes', 2048);
			$table->date('completed_at'); // infer status
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// destroy tasks table
		Schema::drop('tasks');
	}

}
