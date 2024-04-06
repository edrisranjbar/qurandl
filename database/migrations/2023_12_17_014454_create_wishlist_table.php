<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tutorial_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tutorial_id')->references('id')->on('tutorials')->onDelete('cascade');

            // Ensure that a user can only wishlist a tutorial once
            $table->unique(['user_id', 'tutorial_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};