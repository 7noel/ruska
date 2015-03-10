<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('customer');
			$table->string('dni',15);
			$table->date('birth');
			$table->string('address');
			$table->integer('ubigeo_id')->unsigned();
			$table->string('email');
			$table->string('phone',30);
			$table->enum('currency',['US$','S/.']);
			$table->decimal('value',12,2);
			$table->decimal('rate',12,2);
			$table->decimal('primaneta',12,2);
			$table->decimal('factor',12,4);
			$table->decimal('primatotal',12,2);
			$table->boolean('is_confirmed');
			$table->integer('model_id')->unsigned();
			$table->string('serie',20);
			$table->string('motor',20);
			$table->string('placa',20);
			$table->integer('insurance_category_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->foreign('ubigeo_id')->references('id')->on('ubigeos');
			$table->foreign('model_id')->references('id')->on('models');
			$table->foreign('insurance_category_id')->references('id')->on('insurance_categories');
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('quotes');
	}

}
