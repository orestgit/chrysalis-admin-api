<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('meeting_id');
            $table->string('subject');
            $table->string('date');
            $table->integer('status')->default(0);
            $table->string('user_id');
            $table->string('meeting_duration');
            $table->string('meeting_link')->nullable();
            $table->string('meeting_link_host')->nullable();
            $table->string('zoom_meeting_id')->nullable();
            $table->string('meeting_password')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('host')->nullable();
            $table->text('addition_note')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
