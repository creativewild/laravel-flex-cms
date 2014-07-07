<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_en');
            $table->string('title_es');
            $table->string('title_cn');
            $table->string('key')->unique();
            $table->string('keywords');
            $table->string('keywords_en');
            $table->string('keywords_es');
            $table->string('keywords_cn');
            $table->string('description');
            $table->string('description_en');
            $table->string('description_es');
            $table->string('description_cn');
            $table->boolean('published')->default('1');
            $table->boolean('global')->default('0');
            $table->timestamps();
            

           
          
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }


}




























