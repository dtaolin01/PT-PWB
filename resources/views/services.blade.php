@extends('layouts.app')

@section('title', 'Putra Wijaya Berjaya | Logistics & Distribution')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}?v={{ filemtime(public_path('css/services.css')) }}">
@endpush

@section('content')

<div class="services-page">

    {{-- ===== HERO ===== --}}
    <section class="services-hero">
        <img src="{{ asset('images/services_pwb.png') }}" alt="Armada PWB" class="services-image">

        <div class="services-hero-content">
            <div class="services-breadcrumb">
                <span class="services-breadcrumb-line"></span>
                <span>Armada Kami</span>
            </div>

            <h1 class="services-hero-title">
                <span class="services-title-blue">Armada Modern,</span>
                <span class="services-title-blue2">Siap Melayani</span>
            </h1>

            <p class="services-hero-text">
                Kami mengoperasikan tiga jenis armada untuk mendukung distribusi semen dan material konstruksi. Setiap unit
                dirawat secara berkala demi keamanan dan ketepatan waktu pengiriman.
            </p>

            <div class="services-hero-actions">
                <a href="#" class="services-btn services-btn-red">
                    Hubungi Kami
                    <svg class="services-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M15 6l6 6-6 6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== KEUNGGULAN ===== --}}
    <div class="container">
        <div class="features">
            @foreach ($services as $service)
                <article class="feature-card">
                    <div class="feature-icon"></div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                </article>
            @endforeach
        </div>
    </div>

    {{-- ===== JENIS ARMADA ===== --}}
    <div class="container2">
        <div class="eyebrow">Jenis Armada Kami</div>
        <h2 class="section-title">Kendaraan untuk setiap kebutuhan</h2>

        <div class="fleet">
            @foreach ($fleets as $fleet)
                <article class="fleet-card">

                    <div class="fleet-thumb">
                        @if ($fleet->image)
                            <img src="{{ asset('images/' . $fleet->image) }}" alt="{{ $fleet->title }}">
                        @endif
                    </div>

                    <h3>{{ $fleet->title }}</h3>

                    <dl class="details">
                        <dt>Cocok untuk:</dt>
                        <dd>{{ $fleet->suitable_for }}</dd>

                        <dt>Kapasitas:</dt>
                        <dd>{{ $fleet->capacity }}</dd>

                        <dt>Keunggulan:</dt>
                        <dd>{{ $fleet->advantage }}</dd>
                    </dl>

                </article>
            @endforeach
        </div>
    </div>

</div>
@endsection