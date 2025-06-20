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
        Schema::create('comentario_armarios', function (Blueprint $table) {
            $table->id();
            $table->string('comentario', 500);
            $table->foreignId('armario_id')->constrained('armarios');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->date('data_comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_armarios');
    }
};
