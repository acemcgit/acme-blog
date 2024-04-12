<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')//reference of FK on
                ->on('users')//table users
                ->onDelete('cascade');//If the users got deleted all psot related to them would be deleted too
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
