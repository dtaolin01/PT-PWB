@php
$fleet = [
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'blue'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'red'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'yellow'],
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus. Vivamus ultrices sodales sapien.
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
