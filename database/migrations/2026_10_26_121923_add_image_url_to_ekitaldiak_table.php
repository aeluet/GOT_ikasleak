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
    Schema::table('ekitaldiak', function (Blueprint $table) {
        // Nullable dugu lehendik dauden ekitaldiekin arazorik ez izateko
        $table->string('image_url')->nullable()->after('prezioa'); 
    });
}

public function down(): void
{
    Schema::table('ekitaldiak', function (Blueprint $table) {
        $table->dropColumn('image_url');
    });
}
};
