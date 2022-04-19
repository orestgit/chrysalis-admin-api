<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->integer('quiz_id');
            /*$table->foreign('quiz_id')->references('quiz_id')->on('lesson_quiz')->onDelete('cascade');*/
            $table->string('question');
            $table->string('hint');
            $table->tinyInteger('type');
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
        Schema::dropIfExists('quiz_questions');
    }
}
