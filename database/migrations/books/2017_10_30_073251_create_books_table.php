<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cataloger')->unsigned()->index();

            $table->string('author', 150)->unsigned()->index();
            $table->string('title', 200)->unsigned()->index();
            $table->string('editor')->nullable();
            $table->integer('inv_number')->nullable();
            $table->integer('lang_id')->nullable();
            $table->integer('volume')->nullable();
            $table->integer('publish_year')->nullable();
            $table->string('publisher', 150)->nullable();
            $table->string('published_city', 150)->nullable();
            $table->string('published_country', 150)->nullable();
            $table->tinyInteger('isbn')->nullable();
            $table->string('bbk', 20)->nullable();
            $table->string('udk', 20)->nullable();
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->integer('ebook')->nullable();
            $table->integer('cover')->nullable();
            $table->tinyInteger('notorderable')->default(0);
            $table->tinyInteger('only_pdf')->default(0);
            $table->tinyInteger('newbook')->default(0);

            $table->tinyInteger('ordered_id')->nullable();
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
        Schema::drop('books');
    }
}
