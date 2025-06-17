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
        Schema::create('armario', function (Blueprint $table) {
            $table->id();
            $table->string('numero_armario')->unique();
            $table->boolean('status')->default(false);

            $table->unsignedBigInteger('id_setor');
            $table->foreign('id_setor')
                ->references('id')
                ->on('setor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armario');
    }
};
