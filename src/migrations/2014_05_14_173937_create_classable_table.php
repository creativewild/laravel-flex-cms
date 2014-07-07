<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if ( !Schema::hasTable('classables') )
        {
            Schema::create('classables', function($table)
            {

                $table->engine = 'InnoDB';

                $table->integer('element_classes_id');
                $table->integer('classable_id');
                $table->string('classable_type');
          







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
        Schema::drop("classables");
	}

}
