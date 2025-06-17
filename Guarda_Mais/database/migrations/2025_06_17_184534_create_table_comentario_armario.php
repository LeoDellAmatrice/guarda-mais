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
        Schema::create('comentario_armario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_armario');
            $table->foreign('id_armario')
                ->references('id')
                ->on('armario')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')
                ->references('id')
                ->on('usuario')
                ->onDelete('cascade');
            $table->text('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_armario');
    }
};
