<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleBusinessContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_business_contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('business_id');
            $table->text('user_id');
            $table->text('name');
            $table->text('email');
            $table->text('message');
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
        Schema::dropIfExists('single_business_contact');
    }
}
