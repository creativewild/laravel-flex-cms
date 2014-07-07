<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementClassesTable extends Migration {

    public function up()
    {
        if ( !Schema::hasTable('element_classes') )
        {
            Schema::create('element_classes', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('html_class');





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
        Schema::drop('element_classes');
    }

}