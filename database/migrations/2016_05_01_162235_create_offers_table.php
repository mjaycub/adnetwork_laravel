<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertiser_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->string('currency'); // eg: USD
            $table->integer('amount')->unsigned(); // in cents, eg: 2500 is 25.00
            $table->text('description');
            $table->timestamps();

            $table->foreign('advertiser_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offers', function(Blueprint $table)
		{
			Schema::drop('offers');
		});
	}

}
