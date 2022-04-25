<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChapterIdToSurgicalQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surgical_questions', function (Blueprint $table) {
            $table->integer('chapter_id')->after('question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surgical_questions', function (Blueprint $table) {
            Schema::dropIfExists('surgical_questions',['chapter_id']);
        });
    }
}
