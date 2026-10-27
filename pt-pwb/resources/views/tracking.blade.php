@extends('layouts.app')

@section('title', 'Tracking | Putra Wijaya Berjaya')

@push('styles')
@if ($shipment)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">
@endif
<link rel="stylesheet" href="{{ asset('css/pwb-tracking-page.css') }}?v={{ filemtime(public_path('css/pwb-tracking-page.css')) }}">
@endpush

@section('content')

{{-- Banner --}}
<section class="pwb-trk-hero">
    <img src="{{ asset('images/tracking-bg.jpg') }}" alt="" class="pwb-trk-hero-img">

    <div class="pwb-trk-hero-content">
        <div class="pwb-trk-tag">
            <span class="pwb-trk-tag-line"></span>
            <span>Tracking Pengiriman</span>
        </div>

        <h1 class="pwb-trk-hero-title">
            <span>Pantau Pengiriman Anda</span>
            <span>Secara Real-Time</span>
        </h1>

        <p class="pwb-trk-hero-text">
            Cek status pengiriman material konstruksi dan semen Anda dengan mudah dan cepat melalui sistem tracking kami.
        </p>
    </div>
</section>

{{-- Form resi + hasil --}}
<section id="lacak" class="pwb-trk">
    <div class="pwb-trk-inner">

        <form class="pwb-trk-search" action="{{ route('tracking') }}#lacak" method="GET">
            <label class="pwb-trk-field">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="10.5" cy="10.5" r="7"/><path d="M16 16l5 5"/></svg>
                <input type="text" name="resi" value="{{ $resi }}" placeholder="Masukkan nomer resi / nomer pelanggan" autocomplete="off" required>
            </label>

            <button type="submit" class="pwb-trk-btn">
                Lacak
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </button>
        </form>

        @if ($notFound)
        <p class="pwb-trk-error">
            Nomor resi <strong>{{ $resi }}</strong> tidak ditemukan. Periksa kembali nomor resi Anda atau hubungi tim kami.
        </p>
        @endif

        @if ($shipment)
        <div class="pwb-trk-card">

            {{-- Header --}}
            <div class="pwb-trk-head">
                <div class="pwb-trk-head-left">
                    <span class="pwb-trk-resi-label">No Resi</span>
                    <h2 class="pwb-trk-resi">{{ $shipment['resi'] }}</h2>
                </div>

                <div class="pwb-trk-head-right">
                            <span class="pwb-trk-badge pwb-trk-badge--{{ $shipment['status_color'] ?? 'green' }}">
                                {{ $shipment['status_label'] ?? '' }}
                            </span>

                    @if (!empty($shipment['eta_text']))
                    <div class="pwb-trk-eta">
                        <span class="pwb-trk-eta-label">Estimasi Tiba</span>
                        <strong class="pwb-trk-eta-date">{{ $shipment['eta_text'] }}</strong>
                        @if (!empty($shipment['eta_note']))
                        <span class="pwb-trk-eta-note">({{ $shipment['eta_note'] }})</span>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            {{-- Status bertahap --}}
            <ol class="pwb-trk-steps">
                @foreach ($shipment['steps'] ?? [] as $i => $step)
                @php
                $next = ($shipment['steps'][$i + 1] ?? null);
                $classes = trim(
                (!empty($step['done']) ? 'is-done ' : '') .
                (!empty($next['done']) ? 'is-linked' : '')
                );
                @endphp
                <li class="pwb-trk-step {{ $classes }}">
                                <span class="pwb-trk-node">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5L20 6.5"/></svg>
                                </span>
                    <div class="pwb-trk-step-text">
                        <strong class="pwb-trk-step-label">{{ $step['label'] }}</strong>
                        <span class="pwb-trk-step-date">{{ $step['date'] ?? '' }}</span>
                    </div>
                </li>
                @endforeach
            </ol>

            {{-- Detail pengiriman --}}
            @if (!empty($shipment['details']))
            <h3 class="pwb-trk-section-title">Detail Pengiriman</h3>
            <div class="pwb-trk-detail-grid">
                @foreach ($shipment['details'] as $column)
                <div class="pwb-trk-detail-col">
                    @foreach ($column as $row)
                    <div class="pwb-trk-detail-row">
                        <span class="pwb-trk-detail-label">{{ $row[0] }}</span>
                        <span class="pwb-trk-detail-value">{{ $row[1] }}</span>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            @endif

            {{-- Peta --}}
            <h3 class="pwb-trk-section-title pwb-trk-section-title--map">Lokasi Terakhir</h3>
            <div id="pwb-trk-map" class="pwb-trk-map" data-map="{{ json_encode($shipment['map'] ?? []) }}"></div>

            {{-- Informasi --}}
            <div class="pwb-trk-info">
                        <span class="pwb-trk-info-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="12" fill="currentColor"/>
                                <circle cx="12" cy="6.6" r="1.7" fill="#ffffff"/>
                                <rect x="10.3" y="9.8" width="3.4" height="8" rx="1" fill="#ffffff"/>
                            </svg>
                        </span>
                <div>
                    <h4 class="pwb-trk-info-title">Informasi</h4>
                    <p class="pwb-trk-info-text">
                        Posisi Kendaraan diperbarui setiap 2 jam. Jika ada kendala, silahkan hubungi tim kami melalui
                        <a href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener">WhatsApp</a>.
                    </p>
                </div>
            </div>

        </div>
        @endif

    </div>
</section>

@if ($shipment)
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
<script src="{{ asset('js/pwb-tracking-map.js') }}?v={{ filemtime(public_path('js/pwb-tracking-map.js')) }}"></script>
@endif

@endsection
