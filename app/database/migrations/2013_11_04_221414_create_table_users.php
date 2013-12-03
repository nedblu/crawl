<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table){
			$table->increments('id');
			
			$table->string('fullname', 150);
			$table->string('username', 20)->unique;
			$table->string('password', 64);
			$table->string('email', 60)->unique;
			$table->integer('userlevel');

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
		Schema::drop('users');
	}

}