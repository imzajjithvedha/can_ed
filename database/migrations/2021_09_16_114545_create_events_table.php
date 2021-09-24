<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('title');
            $table->text('description');
            $table->text('city');
            $table->text('country');
            $table->date('date');
            $table->time('time');
            $table->text('type');
            $table->text('status');
            $table->text('organizer_email');
            $table->text('organizer_phone');
            $table->text('url')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('events');
    }
}
