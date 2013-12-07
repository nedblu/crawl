<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableConfig extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('config', function($table){
			$table->increments('id');
			
			$table->string('page_name', 150);
			$table->integer('position', 150);
			$table->string('route', 300);

			$table->timestamps();
		});
	}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('config');
	}

}