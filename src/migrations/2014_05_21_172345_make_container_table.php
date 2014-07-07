<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeContainerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
       if ( !Schema::hasTable('containers') )
        {
            Schema::create('containers', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title');
                $table->integer('layouts_id')->unsigned()->nullable();
                $table->foreign('layouts_id')->references('id')->on('layouts');

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
        Schema::drop('containers');
    }

}