<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableLogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('logs', function($table){
			$table->increments('id');

			$table->integer('id_username');
			$table->string('details', 200);

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
		//
		Schema::drop('logs');
	}

}