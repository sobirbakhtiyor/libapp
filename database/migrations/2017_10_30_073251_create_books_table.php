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
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('book_id')->nullable();
            $table->integer('photo_id')->nullable();
            $table->integer('ebook_id')->nullable();
            $table->tinyInteger('ordered_id')->nullable();
            $table->string('book_author', 150)->nullable();
            $table->string('book_name', 150)->nullable();
            $table->integer('book_published_at')->unsigned()->nullable();
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
