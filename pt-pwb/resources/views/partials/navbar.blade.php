<nav class="pwb-navbar">
    <a href="{{ url('/') }}" class="pwb-brand">
        <img src="{{ asset('images/pwb-logo.png') }}" alt="Logo PWB" class="pwb-logo">
        <div class="pwb-text">
            <span class="pwb-title">Putra Wijaya Berjaya</span>
            <span class="pwb-subtitle">Logistics &amp; Distribution</span>
        </div>
    </a>

    <input type="checkbox" id="pwb-toggle" class="pwb-toggle">
    <label for="pwb-toggle" class="pwb-burger" aria-label="Menu">
        <span></span><span></span><span></span>
    </label>

    <ul class="pwb-menu">
        <li><a href="{{ route('home') }}#top" data-section="top" class="active">Home</a></li>
        <li><a href="{{ route('home') }}#tentang" data-section="tentang">About</a></li>
        <li><a href="{{ route('home') }}#layanan" data-section="layanan">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
