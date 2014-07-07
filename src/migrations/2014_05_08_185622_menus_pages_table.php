<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenusPagesTable extends Migration {

    public function up()
    {
        Schema::create('menus_pages', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('menus_id')->unsigned()->index();
            $table->foreign('menus_id')->references('id')->on('menus')->onDelete('cascade');
            $table->integer('pages_id')->unsigned()->index();
            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade');
            
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus_pages');
    }

}
