@extends('layouts.app')

@section('title', 'Putra Wijaya Berjaya | Logistics & Distribution')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pwb-landing.css') }}?v={{ filemtime(public_path('css/pwb-landing.css')) }}">
<link rel="stylesheet" href="{{ asset('css/pwb-about.css') }}?v={{ filemtime(public_path('css/pwb-about.css')) }}">
<link rel="stylesheet" href="{{ asset('css/pwb-services.css') }}?v={{ filemtime(public_path('css/pwb-services.css')) }}">
<link rel="stylesheet" href="{{ asset('css/pwb-fleet.css') }}?v={{ filemtime(public_path('css/pwb-fleet.css')) }}">
<link rel="stylesheet" href="{{ asset('css/pwb-commitment.css') }}?v={{ filemtime(public_path('css/pwb-commitment.css')) }}">
@endpush

@section('content')
<section class="pwb-hero">
    <img src="{{ asset('images/hero-bg.jpg') }}" alt="" class="pwb-hero-bg">
    <div class="pwb-hero-content">

        <div class="pwb-breadcrumb">
            <span class="pwb-breadcrumb-line"></span>
            <span>Logistics</span>
            <span class="pwb-breadcrumb-slash">/</span>
            <span>Cement Transportation</span>
        </div>

        <h1 class="pwb-hero-title">
            <span class="line-white">Delivering Materials</span>
            <span class="line-yellow">For a Stronger Tomorrow</span>
        </h1>

        <p class="pwb-hero-text">
            PWB hadir sebagai mitra logistik terpercaya untuk pengiriman semen dan material konstruksi dengan layanan yang aman, tepat waktu dan profesional.
        </p>

        <div class="pwb-hero-actions">
            <a href="#" class="pwb-btn pwb-btn-red">
                Hubungi Kami
                <svg class="pwb-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </a>
            <a href="#tentang" class="pwb-btn pwb-btn-text">
                Pelajari Lebih Lanjut
                <svg class="pwb-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </a>
        </div>

    </div>
</section>

@include('sections.about')
@include('sections.services')
@include('sections.fleet')
@include('sections.commitment')
@endsection
