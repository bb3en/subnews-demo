<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName');
            $table->string('userAccount',100)->unique();
            $table->string('userPassword');
            $table->dateTime('userJoinDatetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subs_users');
    }
}
