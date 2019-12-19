<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_datas', function(Blueprint $table)
		{
			$table->integer('id', true)->nullable();
			$table->integer('user_id');
			$table->string('name');
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('province')->nullable();
			$table->string('photo')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_datas');
	}

}
