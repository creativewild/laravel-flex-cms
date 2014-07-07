<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        if ( !Schema::hasTable('assets') )
        {
            Schema::create('assets', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title',255);
                $table->string('path',255);
                $table->enum('type',array('Style','Style Framework','Script','JS Library','Plugin','Plugin Call','Event','Font','Vector','Image'));
                $table->enum('position',array('Head-Top','Head-Bottom','Foot-Top','Foot-Bottom'))->nullable();
                $table->boolean('global');
                $table->boolean('cdn');
                $table->string('fallback_path');
                $table->string('fallback_call');
                $table->unique('path');




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
        Schema::drop('assets');
    }

}
