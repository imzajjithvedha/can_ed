<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_careers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('level');
            $table->text('hierarchical');
            $table->text('code');
            $table->text('title');
            $table->text('definition');
            $table->text('status');
            $table->text('featured');
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
        Schema::dropIfExists('all_careers');
    }
}
