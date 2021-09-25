<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldWideNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_wide_network', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('website_name');
            $table->text('url');
            $table->text('name');
            $table->text('phone');
            $table->text('email');
            $table->text('country');
            $table->text('our_banner_url');
            $table->text('image');
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
        Schema::dropIfExists('world_wide_network');
    }
}
