<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProtocolQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol_questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->integer('chapter_id');
            /*$table->foreign('quiz_id')->references('quiz_id')->on('lesson_quiz')->onDelete('cascade');*/
            $table->string('question');
            $table->string('hint');
            $table->text('yes_option_text');
            $table->text('no_option_text');
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
        Schema::dropIfExists('protocol_questions');

    }
}
