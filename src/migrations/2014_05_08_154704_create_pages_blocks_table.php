<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesBlocksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_blocks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pages_id')->unsigned()->index();
            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('blocks_id')->unsigned()->index();
            $table->foreign('blocks_id')->references('id')->on('blocks')->onDelete('cascade');
          
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages_blocks');
    }

}
