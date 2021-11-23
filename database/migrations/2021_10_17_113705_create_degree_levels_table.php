<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('icon')->nullable();
            $table->text('status');
            $table->integer('orders')->nullable();
            $table->text('slug');
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
        Schema::dropIfExists('degree_levels');
    }
}
