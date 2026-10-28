<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('resi', 50)->unique();                        // nomor resi (HURUF BESAR)
            $table->string('status_label', 100)->default('Dalam Perjalanan');
            $table->string('status_color', 20)->default('green');       // green | blue | yellow | red | gray
            $table->date('eta_date')->nullable();                        // estimasi tiba
            $table->string('eta_note', 100)->nullable();                 // kosong = "X Hari Lagi" otomatis
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
