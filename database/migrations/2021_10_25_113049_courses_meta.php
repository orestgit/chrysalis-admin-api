<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoursesMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_meta', function (Blueprint $table) {
            $table->increments('course_mata_id');
            $table->integer('course_id')->references('course_id')->on('courses')->onDelete('cascade');;
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->string('address');
            $table->point('lat');
            $table->point('lng');
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
        Schema::dropIfExists('course_meta');
    }
}
