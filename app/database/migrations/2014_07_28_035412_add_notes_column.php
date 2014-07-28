<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotesColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('tasks', function($table)
		{
			$table->text('notes')->nullable();
			$table->boolean('completed')->default('0');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::table('tasks', function($table)
		{
			$table->dropColumn('notes');
			$table->dropColumn('completed');
		});
	}

}
