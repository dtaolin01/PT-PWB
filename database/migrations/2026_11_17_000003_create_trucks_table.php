<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();              // nama file di public/images
            $table->string('plat')->unique();
            $table->string('jenis');                         // Tronton | Fuso | dst
            $table->unsignedSmallInteger('kapasitas_ton');
            $table->foreignId('supir_id')->nullable()->constrained('supir')->nullOnDelete();
            $table->string('status')->default('tersedia');   // tersedia | digunakan | perawatan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
