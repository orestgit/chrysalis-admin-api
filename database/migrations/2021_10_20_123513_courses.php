<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigincrements('course_id');
            $table->integer('course_category')->references('course_category_id')->on('course_categories')->onDelete('cascade');
            $table->string('title');
            $table->tinyInteger('type');
            $table->float('price');
            $table->text('overview');
            $table->text('summary');
            $table->string('method');
            $table->integer('lesson_duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image');
            $table->text('tags');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('courses');
    }
}
