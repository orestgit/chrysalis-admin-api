<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class ProtocolSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol_submissions', function (Blueprint $table) {
            $table->increments('protocol_submission_id');
            $table->string('question_type');
            $table->integer('question_id');
            $table->integer('submission_id');
            $table->integer('protocol_id');
            $table->integer('user_id');
            $table->tinyInteger('question_option')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('protocol_submissions');
    }
}
