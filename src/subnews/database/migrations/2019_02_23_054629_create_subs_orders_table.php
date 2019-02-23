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
            $table->increments('orderId');
            $table->dateTime('orderDatetime');
            $table->boolean('orderEnable');
            $table->string('channelId',20);
            $table->string('userId',20);
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
