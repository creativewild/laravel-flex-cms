<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       

        Schema::table('pages', function($table)
        {
            $table->integer('layouts_id')->unsigned()->nullable();
            $table->foreign('layouts_id')->references('id')->on('layouts');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
        Schema::table('pages', function($table)
        {
            $table->dropForeign('pages_layouts_id_foreign');

        });

	}

}
