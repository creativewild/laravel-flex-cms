<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignContainerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       

        Schema::table('blocks', function($table)
        {
            $table->integer('containers_id')->unsigned()->nullable();
            $table->foreign('containers_id')->references('id')->on('containers');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
        Schema::table('blocks', function($table)
        {
            $table->dropForeign('blocks_containers_id_foreign');

        });

	}

}
