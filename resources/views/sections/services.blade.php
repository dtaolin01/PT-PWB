@php
$services = [
['title' => 'DISTRIBUSI SEMEN CONCH', 'desc' => 'Sebagai distributor semen Conch, kami menyediakan pasokan semen untuk proyek maupun toko bangunan dengan stok terjaga.', 'color' => 'blue'],
['title' => 'PENGIRIMAN MATERIAL', 'desc' => 'Kami melayani pengiriman semen dan material konstruksi ke berbagai lokasi proyek dengan penanganan yang aman.', 'color' => 'red'],
['title' => 'ARMADA FLEKSIBEL', 'desc' => 'Tersedia truk PS, 6 roda, dan tronton 10 roda yang dapat disesuaikan dengan volume dan kebutuhan pengiriman Anda.', 'color' => 'blue'],
['title' => 'TRACKING PENGIRIMAN', 'desc' => 'Pantau status dan posisi pengiriman Anda melalui sistem tracking kami agar jadwal proyek tetap terkontrol.', 'color' => 'red'],
];
@endphp

<section id="layanan" class="pwb-services">
    <div class="pwb-services-inner">

        <div class="pwb-label">
            <span class="pwb-label-line"></span>
            <span>Layanan Kami</span>
        </div>

        <div class="pwb-services-head">
            <h2 class="pwb-services-title">Solusi Logistik untuk Kebutuhan Anda</h2>

            <a href="#" class="pwb-services-link">
                Lihat Semua Layanan
                <svg class="pwb-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </a>
        </div>

        <div class="pwb-services-grid">
            @foreach ($services as $service)
            <article class="pwb-service-card">
                <div class="pwb-service-icon pwb-service-icon--{{ $service['color'] }}"></div>
                <h3 class="pwb-service-title">{{ $service['title'] }}</h3>
                <p class="pwb-service-desc">{{ $service['desc'] }}</p>
            </article>
            @endforeach
        </div>

    </div>
</section>
