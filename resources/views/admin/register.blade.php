@extends('admin.layout')

@section('title', 'Sign Up')

@section('card')
<h2>Sign Up</h2>
<p class="lead">Buat akun untuk mengakses layanan PWB</p>

<form method="POST" action="{{ route('admin.register.submit') }}">
    @csrf
    @include('admin.partials.fields', ['autocomplete' => 'new-password'])

    <button type="submit" class="btn">Daftar <span>&#8594;</span></button>
</form>

<p class="foot">Sudah punya akun? <a href="{{ route('admin.login') }}">Masuk di sini</a></p>
@endsection
