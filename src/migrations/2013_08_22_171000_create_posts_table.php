<?php
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('posts') )
        {
            Schema::create('posts', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title',255);
                $table->string('title_en',255);
                $table->string('title_cn',255);
                $table->string('title_es',255);
                $table->string('slug',255);
                $table->unique('slug');
                $table->text('content');
                $table->string('keywords')->nullable();
                $table->string('description')->nullable();
                $table->boolean('truncate')->default(true);
                $table->integer('truncate_length')->default('150');
                $table->string('type');
                $table->string('en');
                $table->string('cn');
                $table->string('es');
                $table->text('description_en');
                $table->text('description_cn');
                $table->text('description_es');
                $table->text('intro_pt');
                $table->text('intro_es');
                $table->text('intro_en');
                $table->text('intro_cn');
                $table->softDeletes();
                $table->boolean('published')->default('1');
                $table->timestamps();

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
        Schema::drop('posts');
    }

}