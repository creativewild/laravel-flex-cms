<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlocksPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blocks_posts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('blocks_id')->unsigned()->index();
			$table->foreign('blocks_id')->references('id')->on('blocks')->onDelete('cascade');
			$table->integer('posts_id')->unsigned()->index();
			$table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
	
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('block_post');
	}

}
