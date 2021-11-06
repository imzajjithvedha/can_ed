<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolAdmissionEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_admission_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('school_id');
            $table->text('name');
            $table->text('position');
            $table->text('description');
            $table->text('phone');
            $table->text('email');
            $table->text('image');
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
        Schema::dropIfExists('school_admission_employees');
    }
}
