<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_status', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->integer('offer_id')->unsigned()->index();
            $table->foreign('offer_id')->references('id')->on('offers');
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
		Schema::table('offer_status', function(Blueprint $table)
		{
			Schema::drop('offer_status');
		});
	}

}
