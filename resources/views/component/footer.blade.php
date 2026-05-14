<footer class="site-footer">
    <div class="site-footer__glow" aria-hidden="true"></div>

    <div class="site-footer__inner">
        <div class="site-footer__brand">
            <a class="site-nav__brand site-footer__brand-link" href="{{ url('/') }}" aria-label="RoomCha home">
                <span class="site-nav__brand-mark">R</span>
                <span>
                    <span class="site-nav__brand-name">RoomCha</span>
                    <span class="site-nav__brand-tagline">Find rooms with confidence</span>
                </span>
            </a>
            <p>
                A smarter rental experience for students, owners, and room seekers who want trustworthy listings without the clutter.
            </p>
            <div class="site-footer__socials" aria-label="Social links">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="RoomCha on Facebook">
                    <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="RoomCha on Instagram">
                    <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" aria-label="RoomCha on Twitter">
                    <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="site-footer__column">
            <h2>Explore</h2>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('service.rooms') }}">Rooms</a></li>
                <li><a href="{{ url('/about') }}">About RoomCha</a></li>
                <li><a href="{{ route('register') }}">Create account</a></li>
            </ul>
        </div>

        <div class="site-footer__column">
            <h2>For renters</h2>
            <ul>
                <li><a href="{{ route('service.rooms') }}">Browse featured rooms</a></li>
                <li><a href="{{ route('login') }}">Sign in</a></li>
                <li><a href="{{ route('register') }}">Join as tenant</a></li>
            </ul>
        </div>

        <div class="site-footer__panel">
            <span class="site-footer__eyebrow">Ready to move?</span>
            <h2>Find a room that feels like home.</h2>
            <p>Start with verified listings and simple account tools built for faster decisions.</p>
            <a href="{{ route('service.rooms') }}" class="site-footer__cta">
                Browse rooms
                <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="site-footer__bottom">
        <span>&copy; {{ date('Y') }} RoomCha. All rights reserved.</span>
        <span>Built for clear, confident room discovery.</span>
    </div>
</footer>
