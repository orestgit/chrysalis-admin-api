<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->text('title');
            $table->text('description');
            $table->text('short_description');
            $table->integer('author_id');
            $table->integer('type')->references('post_type_id')->on('post_types')->onDelete('cascade');
            $table->string('image');
            $table->tinyInteger('status');
            $table->text('tags');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
