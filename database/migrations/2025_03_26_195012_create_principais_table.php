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
        Schema::create('principais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cargo_atual');
            $table->string('titulo_academico');
            $table->json('idioma')->nullable();
            $table->json('formacao')->nullable();
            $table->json('instituicao')->nullable();
            $table->json('experiencia')->nullable();
            $table->json ('grau')->nullable();
            $table->json('areas')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('principais');
    }
};
