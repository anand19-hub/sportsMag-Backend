<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventTable', function (Blueprint $table) {
            $table->id();
            $table->integer('org_id');
            $table->string('eventName');
            $table->string('eventDate');
            $table->string('eventLocation');
            $table->string('eventfees');
            $table->string('eventDescription');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventTable');
    }
}
