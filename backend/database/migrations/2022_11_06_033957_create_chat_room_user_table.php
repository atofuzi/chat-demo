<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_room_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_room_id')->references('id')->on('chat_rooms');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('read_message_id')->default(0)->references('id')->on('chat_messages');
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
        Schema::dropIfExists('chat_room_user');
    }
};
