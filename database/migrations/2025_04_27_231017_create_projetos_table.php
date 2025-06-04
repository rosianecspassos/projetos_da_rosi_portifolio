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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->text('imagem')->nullable();
            $table->string('nome_projeto');
            $table->string('link');
            $table->text('descricao');
            $table->timestamps();
        });
    }
//modificar a estrutura da tabela para que o campo imagem tenha o tipo text ao invés de string.
//php artisan make:migration alter_imagem_column_on_projetos_table

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
