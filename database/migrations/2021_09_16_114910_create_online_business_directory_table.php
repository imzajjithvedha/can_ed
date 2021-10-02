<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineBusinessDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_business_directory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('name')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('industry')->nullable();
            $table->text('status');
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
        Schema::dropIfExists('online_business_directory');
    }
}
