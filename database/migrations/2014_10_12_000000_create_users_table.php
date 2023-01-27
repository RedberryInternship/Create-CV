<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->foreignId('token_id');
			$table->integer('key');
			$table->string('name');
			$table->string('surname');
			$table->string('email');
			$table->string('phone_number');
			$table->foreignId('country_id');
			$table->string('city');
			$table->string('image');
			$table->text('about_me')->nullable();
			$table->tinyInteger('english_lang');
			$table->tinyInteger('georgian_lang');
			$table->text('skills');
			$table->rememberToken();
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
		Schema::dropIfExists('users');
	}
};
