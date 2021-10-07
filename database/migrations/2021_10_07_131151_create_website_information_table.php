<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('mantra');
            $table->text('address_1');
            $table->text('address_2');
            $table->text('address_3');
            $table->text('address_4');
            $table->text('address_5');
            $table->text('telephone');
            $table->text('email');
            $table->text('website_url');
            $table->text('facebook');
            $table->text('google');
            $table->text('you_tube');
            $table->text('instagram');
            $table->text('twitter');
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
        Schema::dropIfExists('website_information');
    }
}
