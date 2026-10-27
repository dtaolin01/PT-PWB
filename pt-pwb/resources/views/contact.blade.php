@extends('layouts.app')

@section('title', 'Putra Wijaya Berjaya | Logistics & Distribution')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pwb-contact-page.css') }}?v={{ filemtime(public_path('css/pwb-contact-page.css')) }}">
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="contact-hero">
    <div class="contact-hero__content">
        <div class="contact-tag"><span class="contact-tag__line"></span> Hubungi Kami</div>
        <h1>Siap menjadi mitra<br>logistik Anda</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id
            interdum finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
    </div>
</section>

{{-- ===== INFO CARDS ===== --}}
<section class="contact-info">
    <div class="contact-info__grid">

        <article class="contact-info__card">
            <div class="contact-info__icon">
                <svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.8a16 16 0 0 0 6 6l1.3-1.2a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></svg>
            </div>
            <h3>Telepon</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="contact-info__card">
            <div class="contact-info__icon">
                <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>
            </div>
            <h3>Email</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="contact-info__card">
            <div class="contact-info__icon">
                <svg viewBox="0 0 24 24"><path d="M12 22s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12z"/><circle cx="12" cy="10" r="2.5"/></svg>
            </div>
            <h3>Alamat</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="contact-info__card">
            <div class="contact-info__icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            </div>
            <h3>Jam Kerja</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

    </div>
</section>

{{-- ===== FORM + LOKASI ===== --}}
<section class="contact-main">
    <div class="contact-main__grid">

        {{-- Form --}}
        <div class="contact-form-card">
            <div class="contact-form-card__title">
                <span class="contact-tag__line"></span>
                <h2>Kirim Pesan</h2>
            </div>
            <p class="contact-form-card__lead">
                Isi form dibawah ini dan tim kami akan segera menghubungi Anda.
            </p>

            @if (session('success'))
            <div class="contact-alert contact-alert--success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="#">
                @csrf

                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <div class="contact-error">{{ $message }}</div> @enderror

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="contact-error">{{ $message }}</div> @enderror

                <label for="telepon">No Telepon</label>
                <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}">
                @error('telepon') <div class="contact-error">{{ $message }}</div> @enderror

                <label for="subjek">Subjek</label>
                <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" required>
                @error('subjek') <div class="contact-error">{{ $message }}</div> @enderror

                <button type="submit" class="contact-btn">
                    Kirim Pesan <span>&#8594;</span>
                </button>
            </form>
        </div>

        {{-- Lokasi --}}
        <aside class="contact-location-card">
            <h2>Lokasi Kami</h2>

            <div class="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.63281339515!2d117.15136547545379!3d-0.5525134352653582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df681002812841b%3A0x9f693efaaa840768!2sPT.%20PUTRA%20WIJAYA%20BERJAYA%20(%20PWB%20)!5e0!3m2!1sen!2sid!4v1793113402736!5m2!1sen!2sid"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin"
                    title="Lokasi PT Putra Wijaya Berjaya"></iframe>
            </div>

            <h3>PT Putra Wijaya Berjaya</h3>

            <div class="contact-address">
                <svg viewBox="0 0 24 24"><path d="M12 22s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12z"/><circle cx="12" cy="10" r="2.6" class="hole"/></svg>
                <p>Jl. Raya Simpang Pasir Rt 29 Samarinda</p>
            </div>

            <a class="contact-maps-link" target="_blank" rel="noopener"
               href="https://maps.app.goo.gl/uhwC71qUUFmsJEHh6">
                Lihat Google Maps <span>&#8594;</span>
            </a>

            <div class="contact-location-card__bar"></div>
        </aside>

    </div>
</section>

@endsection
