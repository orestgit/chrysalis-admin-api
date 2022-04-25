<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHintColorToSurgicalQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surgical_question_options', function (Blueprint $table) {
            $table->string('hint_color')->default('#000000')->after('hint');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surgical_question_options', function (Blueprint $table) {
            Schema::dropColumns('surgical_question_options',['hint_color']);
        });
    }
}
