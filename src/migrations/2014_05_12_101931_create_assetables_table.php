<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        if ( !Schema::hasTable('assetables') )
        {
            Schema::create('assetables', function($table)
            {

                $table->engine = 'InnoDB';

                $table->integer('assets_id');
                $table->integer('assetable_id');
                $table->string('assetable_type');






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
        Schema::drop('assetables');
    }

}
