<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->boolean('draft');
			$table->text('url');
			$table->text('img');
			$table->text('body');
			$table->string('type');
			$table->string('tag1');
			$table->string('tag2');
			$table->string('tag3');
			$table->string('approved');
			$table->integer('user_id');
			$table->integer('favorite_id');
			$table->integer('like_id');

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
		Schema::drop('posts');
	}

}
