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
        Schema::create('ekitaldiak', function (Blueprint $table) {
            $table->id();
            $table->string('izenburua');
            $table->text('deskribapena');
            $table->date('data');
            $table->string('aretoa');
            $table->decimal('prezioa', 8, 2);
            $table->unsignedInteger('edukiera');
            $table->foreignId('kategoria_id')->constrained('kategoriak')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
