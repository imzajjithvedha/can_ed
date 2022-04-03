<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('school_id');
            $table->text('city');
            $table->text('province');
            $table->text('country');
            $table->text('link');
            $table->text('color');
            $table->text('image');
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
        Schema::dropIfExists('virtual_tours');
    }
}
