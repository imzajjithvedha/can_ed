<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('name');
            $table->text('category_1');
            $table->text('category_2')->nullable();
            $table->text('category_3')->nullable();
            $table->text('description');
            $table->text('contact_name');
            $table->text('email');
            $table->text('phone');
            $table->text('address');
            $table->text('image');
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('you_tube')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('package');
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
        Schema::dropIfExists('businesses');
    }
}
