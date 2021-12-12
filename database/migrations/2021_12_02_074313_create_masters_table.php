<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id')->nullable();
            $table->text('school_id')->nullable();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('dob');
            $table->text('gender');
            $table->text('email');
            $table->text('phone');
            $table->text('school_text');
            $table->text('messaging_app')->nullable();
            $table->text('username')->nullable();
            $table->text('citizenship');
            $table->text('citizenship_live');
            $table->text('country')->nullable();
            $table->text('status')->nullable();
            $table->text('mailing_address');
            $table->text('school_name');
            $table->text('gpa');
            $table->text('school_city');
            $table->text('school_country');
            $table->text('start_date');
            $table->text('interested');
            $table->text('like_study');
            $table->text('student_type');
            $table->text('funding_source')->nullable();
            $table->text('tests')->nullable();
            $table->text('comments')->nullable();
            $table->text('questions')->nullable();
            $table->text('transfer_student');
            $table->text('visa');
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
        Schema::dropIfExists('masters');
    }
}
