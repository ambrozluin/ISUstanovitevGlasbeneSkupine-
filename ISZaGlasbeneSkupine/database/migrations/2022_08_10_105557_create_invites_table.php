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
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('sender_id')->references('id')
            ->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('receiver_id')->references('id')
            ->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->references('id')
            ->on('glasbeneskupine')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('instrument');
            $table->string('namen');
            $table->string('token', 16)->unique();
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
        Schema::dropIfExists('invites');
    }
};
