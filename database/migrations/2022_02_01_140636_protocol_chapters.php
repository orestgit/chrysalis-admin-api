<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProtocolChapters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol_chapters', function (Blueprint $table) {
            $table->increments('chapter_id');
            $table->string('label')->nullable();
            $table->text('question')->nullable();
            $table->integer('yes_option')->default(0);
            $table->integer('no_option')->nullable(0);
            $table->integer('skip_option')->nullable(0);
            $table->text('yes_option_text')->nullable();
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
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
        Schema::dropIfExists('protocol_chapters');
    }
}
