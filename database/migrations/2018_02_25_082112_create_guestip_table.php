<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestip', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HTTP_CLIENT_IP');
            $table->string('HTTP_X_FORWARDED_FOR');
            $table->string('REMOTE_ADDR');
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
        Schema::dropIfExists('guestip');
    }
}
