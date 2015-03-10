<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',30);
			$table->string('password');
			$table->string('first_name',30);
			$table->string('last_name',30);
			$table->string('email',35);
			$table->integer('branch_id')->unsigned()->nullable();
			$table->boolean('is_staff');
			$table->boolean('is_superuser');
			$table->string('remember_token')->nullable();
			$table->dateTime('last_login')->nullable();

			$table->foreign('branch_id')->references('id')->on('branches');

			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
