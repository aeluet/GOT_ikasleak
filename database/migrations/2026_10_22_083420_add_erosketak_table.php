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
        Schema::create('erosketak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ekitaldia_id')->constrained('ekitaldiak')->restrictOnDelete();
            $table->foreignId('erabiltzailea_id')->constrained('users')->restrictOnDelete();
            $table->unsignedInteger('kantitatea');
            $table->decimal('guztira', 8, 2);
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
