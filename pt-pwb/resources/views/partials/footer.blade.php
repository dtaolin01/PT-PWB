@php
$contacts = [
['type' => 'whatsapp', 'text' => 'Lorem ipsum dolor sit amet, consectetur', 'href' => '#'],
['type' => 'email',    'text' => 'Lorem ipsum dolor sit amet, consectetur', 'href' => '#'],
['type' => 'location', 'text' => 'Lorem ipsum dolor sit amet, consectetur', 'href' => '#'],
];
@endphp

<footer id="kontak" class="pwb-footer">

    {{-- Hubungi Kami --}}
    <div class="pwb-contact">
        <div class="pwb-contact-inner">

            <div class="pwb-contact-photo">
                <img src="{{ asset('images/contact.png') }}" alt="Tim PWB">
            </div>

            <div class="pwb-contact-text">
                <div class="pwb-footer-label">
                    <span class="pwb-footer-line"></span>
                    <span>Hubungi Kami</span>
                </div>

                <h2 class="pwb-contact-title">Siap Menjadi Mitra Logistik Anda</h2>

                <p class="pwb-contact-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus. Vivamus ultrices sodales sapien, eu iaculis lectus malesuada a. Morbi rutrum laoreet tempus. Nulla nec risus tortor. Nunc sit amet ultricies augue.
                </p>
            </div>

            <div class="pwb-contact-list">
                @foreach ($contacts as $contact)
                <a href="{{ $contact['href'] }}" class="pwb-contact-item">
                        <span class="pwb-contact-icon">
                            @if ($contact['type'] === 'whatsapp')
                            <img src="{{ asset('images/icons/IconWhatsapp.png') }}" alt="">

                            @elseif ($contact['type'] === 'email')
                            <img src="{{ asset('images/icons/IconGmail.png') }}" alt="">

                            @else
                            <img src="{{ asset('images/icons/IconLocation.png') }}" alt="">
                            @endif
                        </span>
                    <span class="pwb-contact-label">{{ $contact['text'] }}</span>
                </a>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Bar bawah: logo + nama --}}
    <div class="pwb-footer-bar">
        <a href="{{ url('/') }}" class="pwb-footer-brand">
            <img src="{{ asset('images/pwb-logo.png') }}" alt="Logo PWB" class="pwb-footer-logo">
            <div class="pwb-footer-brand-text">
                <span class="pwb-footer-brand-title">Putra Wijaya Berjaya</span>
                <span class="pwb-footer-brand-sub">Logistics &amp; Distribution</span>
            </div>
        </a>
    </div>

</footer>
