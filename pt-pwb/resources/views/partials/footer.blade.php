<footer class="pwb-footer">
    <div class="pwb-footer-inner">

        <div class="pwb-footer-grid">

            {{-- Brand + deskripsi + ikon --}}
            <div class="pwb-footer-col pwb-footer-col--brand">
                <a href="{{ url('/') }}" class="pwb-footer-brand">
                    <img src="{{ asset('images/pwb-logo.png') }}" alt="Logo PWB" class="pwb-footer-logo">
                    <div class="pwb-footer-brand-text">
                        <span class="pwb-footer-brand-title">Putra Wijaya Berjaya</span>
                        <span class="pwb-footer-brand-sub">Logistics &amp; Distribution</span>
                    </div>
                </a>

                <p class="pwb-footer-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id
                    interdum finibus. Vivamus ultrices sodales sapien, eu iaculis lectus malesuada
                    a. Morbi rutrum laoreet tempus.
                </p>

                <div class="pwb-footer-social">
                    <a href="#" aria-label="WhatsApp" target="_blank" rel="noopener">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M3 21l1.6-4.6A9 9 0 1 1 8 19.6L3 21z"/>
                            <path d="M9 7.8c-.4 0-.9.5-1 1.2-.2 1.6 1.2 3.7 2.8 5 1.4 1.1 3 1.8 4.2 1.4.7-.2 1.1-.8 1.1-1.3l-1.8-1-.9.8c-1-.4-2.2-1.5-2.7-2.6l.8-.9-.9-2.1c-.1-.3-.4-.5-.6-.5z"/>
                        </svg>
                    </a>
                    <a href="mailto:info@example.com" aria-label="Email">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="2" y="5" width="20" height="14" rx="1"/>
                            <path d="M2 6l10 7.5L22 6"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick links --}}
            <div class="pwb-footer-col">
                <h4 class="pwb-footer-heading">Quick Links</h4>
                <ul class="pwb-footer-list">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a href="{{ url('/contact') }}">Contacts</a></li>
                    <li><a href="#">Tracking</a></li>
                </ul>
            </div>

            {{-- Our services --}}
            <div class="pwb-footer-col">
                <h4 class="pwb-footer-heading">Our Services</h4>
                <ul class="pwb-footer-list">
                    <li><a href="#">Armada 1</a></li>
                    <li><a href="#">Armada 2</a></li>
                    <li><a href="#">Armada 3</a></li>
                </ul>
            </div>

            {{-- Stay connected + lokasi --}}
            <div class="pwb-footer-col pwb-footer-col--connect">
                <h4 class="pwb-footer-heading">Stay Connected</h4>
                <form class="pwb-footer-form" method="POST" action="#">
                    @csrf
                    <input type="email" name="email" placeholder="Enter Email Address" aria-label="Email" required>
                    <button type="submit">Kirim</button>
                </form>

                <h4 class="pwb-footer-heading pwb-footer-heading--office">Office Location</h4>
                <p class="pwb-footer-address">Jl. Raya Simpang Pasir Rt 29 Samarinda</p>
            </div>

        </div>

        <div class="pwb-footer-line"></div>
    </div>

    {{-- Dekorasi strip warna pojok kanan bawah --}}
    <img src="{{ asset('images/pwb-footer-stripes.png') }}" alt="" class="pwb-footer-stripes" aria-hidden="true">
</footer>
