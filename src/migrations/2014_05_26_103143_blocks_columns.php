<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlocksColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        if ( !Schema::hasTable('blocks_columns') )
        {
            Schema::create('blocks_columns', function($table)
            {

                $table->engine = 'InnoDB';



                 $table->integer('blocks_id')->unsigned()->nullable();
                 $table->foreign('blocks_id')->references('id')->on('blocks');
                 $table->integer('columns_id')->unsigned()->nullable();
                 $table->foreign('columns_id')->references('id')->on('columns');
                 $table->integer('pages_id')->unsigned()->nullable();
                 $table->foreign('pages_id')->references('id')->on('pages');
                 $table->primary(array('blocks_id', 'columns_id', 'pages_id'));







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
        Schema::drop('blocks_columns');
    }

}