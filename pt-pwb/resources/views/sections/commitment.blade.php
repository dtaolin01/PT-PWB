@php
$commitments = [
['icon' => 'commitment-1.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-2.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-3.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-4.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
];
@endphp

<section id="komitmen" class="pwb-commit">
    <img src="{{ asset('images/commitment-bg.jpg') }}" alt="" class="pwb-commit-bg">
    <div class="pwb-commit-inner">

        <div class="pwb-commit-label">
            <span class="pwb-commit-line"></span>
            <span>Layanan Kami</span>
        </div>

        <h2 class="pwb-commit-title">Komitmen Kami untuk Anda</h2>

        <div class="pwb-commit-grid">
            @foreach ($commitments as $item)
            <div class="pwb-commit-item">
                <div class="pwb-commit-icon">
                    @if (file_exists(public_path('images/icons/' . $item['icon'])))
                    <img src="{{ asset('images/icons/' . $item['icon']) }}" alt="">
                    @endif
                </div>
                <p class="pwb-commit-text">{{ $item['text'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>
