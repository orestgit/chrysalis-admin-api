<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExplanationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('protocol_questions', function (Blueprint $table) {
            $table->text('explanation')->after('hint');
            $table->string('video_thumbnail')->after('explanation');
            $table->string('video')->after('video_thumbnail');
            $table->string('button_text')->after('video');
            $table->string('button_link')->after('button_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('protocol_questions', function (Blueprint $table) {
            //
        });
    }
}
