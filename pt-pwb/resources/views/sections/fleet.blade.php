@php
$fleet = [
['title' => 'TRUK PS', 'desc' => 'Lincah untuk pengiriman volume kecil hingga menengah.', 'color' => 'blue'],
['title' => 'TRUK 6 RODA', 'desc' => 'LSeimbang untuk kapasitas menengah dan akses jalan yang beragam.', 'color' => 'red'],
['title' => 'TRONTON', 'desc' => 'Kapasitas besar untuk kebutuhan proyek skala besar.', 'color' => 'yellow'],
];
@endphp

<section id="armada" class="pwb-fleet">
    <div class="pwb-fleet-inner">

        {{-- Kiri: foto --}}
        <div class="pwb-fleet-photo">
            <img src="{{ asset('images/fleet.png') }}" alt="Armada PWB">
        </div>

        {{-- Kanan: teks + kartu --}}
        <div class="pwb-fleet-content">
            <div class="pwb-label">
                <span class="pwb-label-line"></span>
                <span>Armada Kami</span>
            </div>

            <h2 class="pwb-fleet-title">Armada Modern, Siap Melayani</h2>

            <p class="pwb-fleet-desc">
                Armada kami dirawat secara berkala dan dioperasikan oleh pengemudi berpengalaman, sehingga setiap pengiriman semen dan material konstruksi sampai dengan aman dan tepat waktu.
            </p>

            <div class="pwb-fleet-cards">
                @foreach ($fleet as $item)
                <article class="pwb-fleet-card">
                    <div class="pwb-fleet-card-head">
                        <div class="pwb-fleet-icon pwb-fleet-icon--{{ $item['color'] }}">
                            <img src="{{ asset('images/icons/truck.png') }}" alt="">
                        </div>
                        <h3 class="pwb-fleet-card-title pwb-fleet-card-title--{{ $item['color'] }}">{{ $item['title'] }}</h3>
                    </div>
                    <p class="pwb-fleet-card-text">{{ $item['desc'] }}</p>
                </article>
                @endforeach
            </div>
        </div>

    </div>
</section>
