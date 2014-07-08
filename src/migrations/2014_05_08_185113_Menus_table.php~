<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenusTable extends Migration {


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('menus') )
        {
            Schema::create('menus', function($table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('title',255);
                $table->integer('parent_menu_id')->unsigned()->index();
                $table->foreign('parent_menu_id')->references('id')->on('menus')->nullable();
                



            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }

}
