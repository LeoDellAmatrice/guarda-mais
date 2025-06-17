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
        Schema::create('table_aluguel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_armario');
            $table->foreign('id_armario')
                ->references('id')
                ->on('armario')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_aluno');
            $table->foreign('id_aluno')
                ->references('id')
                ->on('aluno')
                ->onDelete('cascade');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_aluguel');
    }
};
