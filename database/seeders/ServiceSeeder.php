<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Service::insert([
        // DATA SERVICE LAMA
        // [
        //     'title' => 'Armada Terawat',
        //     'description' => 'Setiap unit diperiksa dan dirawat berkala agar selalu siap beroperasi.',
        //     'category' => 'service',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],

        // [
        //     'title' => 'Pengiriman Tepat Waktu',
        //     'description' => 'Penjadwalan yang terencana agar material tiba sesuai kebutuhan di lokasi.',
        //     'category' => 'service',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],

        // [
        //     'title' => 'Pengemudi Berpengalaman',
        //     'description' => 'Dikemudikan oleh pengemudi terlatih yang memahami rute dan standar keselamatan.',
        //     'category' => 'service',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],

        // [
        //     'title' => 'Kapasitas Sesuai Kebutuhan',
        //     'description' => 'Pilih armada yang sesuai dengan volume pengiriman proyek Anda.',
        //     'category' => 'service',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ],

        // DATA ARMADA BARU
        [
            'title' => 'Truk PS',
            'description' => 'Cocok untuk pengiriman barang skala kecil.',
            'image' => 'services_pwb.png',
            'category' => 'fleet',
            'suitable_for' => 'Pengiriman material dalam jumlah kecil.',
            'capacity' => 'Hingga 4 ton',
            'advantage' => 'Fleksibel dan mudah menjangkau area proyek.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'title' => 'Truk 6 Roda',
            'description' => 'Cocok untuk pengiriman barang skala menengah.',
            'image' => 'services_pwb.png',
            'category' => 'fleet',
            'suitable_for' => 'Pengiriman material proyek skala menengah.',
            'capacity' => 'Hingga 8 ton',
            'advantage' => 'Kapasitas lebih besar dan stabil.',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'title' => 'Tronton (Truk 10 Roda)',
            'description' => 'Cocok untuk pengiriman barang skala besar.',
            'image' => 'services_pwb.png',
            'category' => 'fleet',
            'suitable_for' => 'Pengiriman material proyek skala besar.',
            'capacity' => 'Hingga 20 ton',
            'advantage' => 'Mampu mengangkut material dalam jumlah besar.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
