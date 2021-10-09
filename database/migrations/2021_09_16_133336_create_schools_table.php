<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('name');
            $table->text('website');
            $table->text('user_email');
            $table->text('user_phone');
            $table->text('reach_time');
            $table->text('time_zone');
            $table->text('school_email')->nullable();
            $table->text('school_phone')->nullable();
            $table->text('country');
            $table->text('message');
            $table->text('status');
            $table->text('featured_image')->nullable();
            $table->text('images')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('you_tube')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('links')->nullable();
            $table->text('location')->nullable();
            $table->text('school_type')->nullable();
            $table->text('language')->nullable();
            $table->text('undergraduates')->nullable();
            $table->text('entrance_dates')->nullable();
            $table->text('canadian_tuition_fee')->nullable();
            $table->text('international_tuition_fee')->nullable();
            $table->text('telephone')->nullable();
            $table->text('fax')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
