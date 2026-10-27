@extends('admin.layout')

@section('title', 'Sign In')

@section('card')
<h2>Sign In</h2>
<p class="lead">Masuk ke akun untuk melanjutkan.</p>

<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    @include('admin.partials.fields')

    <div class="row">
        <label><input type="checkbox" name="remember" value="1"> Ingat Saya</label>
        <a href="#">Lupa Password?</a>
    </div>

    <button type="submit" class="btn">Masuk <span>&#8594;</span></button>
</form>

<p class="foot">Belum punya akun? <a href="{{ route('admin.register') }}">Daftar di sini</a></p>
@endsection
