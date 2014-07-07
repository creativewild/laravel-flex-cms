<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        if ( !Schema::hasTable('layouts') )
        {
            Schema::create('layouts', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title');
                $table->unique('title');




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
        Schema::drop('layouts');
    }

}
