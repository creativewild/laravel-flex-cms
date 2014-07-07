<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        if ( !Schema::hasTable('columns') )
        {
            Schema::create('columns', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->integer('containers_id')->unsigned();
                $table->foreign('containers_id')->references('id')->on('containers')->onDelete('cascade');
                $table->integer('order');




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
        Schema::drop('columns');
    }

}