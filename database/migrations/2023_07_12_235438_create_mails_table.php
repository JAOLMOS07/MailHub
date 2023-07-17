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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->text('contenido');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_destination_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_destination_id')->references('id')->on('users');
            $table->boolean('importante')->default(false);
            $table->boolean('visto')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
