<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *    
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('sobres', function (Blueprint $table) {
        $table->id();
        $table->text('desc_sobre');
        $table->string('competencia');
        $table->string('curso');
        $table->string('link_curso'); // nome correto
        $table->text('desc_curso');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sobres');
    }
};
