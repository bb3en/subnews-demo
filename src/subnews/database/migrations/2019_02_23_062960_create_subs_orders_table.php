<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('orderDatetime');
            $table->boolean('orderEnable');
            $table->unsignedInteger('channelId');
            $table->unsignedInteger('userId');
            $table->foreign('channelId')->references('id')->on('subs_channels');
            $table->foreign('userId')->references('id')->on('subs_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subs_orders');
    }
}
