@extends('layouts.app')

@section('title', 'Contact | Putra Wijaya Berjaya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pwb-contact-page.css') }}?v={{ filemtime(public_path('css/pwb-contact-page.css')) }}">
@endpush

@section('content')
<section class="pwb-contact-page">
    <div class="pwb-contact-page-inner">
        <h1 class="pwb-contact-page-title">Contacts</h1>
    </div>
</section>
@endsection
