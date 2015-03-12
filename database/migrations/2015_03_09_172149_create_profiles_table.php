<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('location')->nullable();
			$table->text('bio')->nullable();
			$table->string('youtube_username')->nullable();
			$table->string('twitter_username')->nullable();
			$table->string('instagram_username')->nullable();
			$table->string('facebook_page_name')->nullable();
			$table->string('vine_username')->nullable();
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
		Schema::table('profiles', function(Blueprint $table)
		{
			Schema::drop('profiles');
		});
	}

}
