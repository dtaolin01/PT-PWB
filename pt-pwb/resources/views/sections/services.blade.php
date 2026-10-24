@php
$services = [
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.', 'color' => 'blue'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.', 'color' => 'red'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.', 'color' => 'blue'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.', 'color' => 'red'],
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
