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
            $table->string('cataloger');

            $table->string('author', 150)->index();
            $table->string('title', 200)->index();
            $table->string('editor')->nullable();
            $table->integer('inv_number')->nullable();
            $table->integer('lang_id')->nullable();
            $table->integer('volume')->nullable();
            $table->integer('publish_year')->nullable();
            $table->string('publisher', 150)->nullable();
            $table->string('published_city', 150)->nullable();
            $table->string('published_country', 150)->nullable();
            $table->string('isbn')->nullable();
            $table->string('bbk', 20)->nullable();
            $table->string('udk', 20)->nullable();
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->integer('ebook_id')->nullable();
            $table->integer('cover_id')->nullable();
            $table->tinyInteger('notorderable')->default(0);
            $table->tinyInteger('only_pdf')->default(0);
            $table->tinyInteger('newbook')->default(0);
            $table->integer('view_count')->nullable();
            $table->integer('review_count')->nullable();
            $table->integer('download_count')->nullable();
            $table->integer('online_reading_count')->nullable();
            $table->integer('rate_count')->nullable();
            $table->integer('rating')->nullable();
            $table->string('location')->nullable();

            $table->integer('user_id')->nullable();
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
