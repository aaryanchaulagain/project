@php
    $homeActive = request()->is('/');
    $roomsActive = request()->routeIs('service.rooms') || request()->is('dog');
    $aboutActive = request()->is('about');
@endphp

<nav class="site-nav" data-site-nav>
    <div class="site-nav__inner">
        <a class="site-nav__brand" href="{{ url('/') }}" aria-label="RoomCha home">
            <span class="site-nav__brand-mark">R</span>
            <span>
                <span class="site-nav__brand-name">RoomCha</span>
                <span class="site-nav__brand-tagline">Find rooms with confidence</span>
            </span>
        </a>

        <div class="site-nav__desktop" aria-label="Primary navigation">
            <a class="site-nav__link {{ $homeActive ? 'is-active' : '' }}" href="{{ url('/') }}" @if($homeActive) aria-current="page" @endif>
                Home
            </a>

            <div class="site-nav__item site-nav__item--mega">
                <button class="site-nav__link site-nav__mega-trigger {{ $roomsActive ? 'is-active' : '' }}" type="button" data-mega-trigger aria-expanded="false">
                    Rooms
                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </button>

                <div class="site-nav__mega" data-mega-menu>
                    <div class="site-nav__mega-feature">
                        <span class="site-nav__eyebrow">RoomCha marketplace</span>
                        <h3>Verified spaces for every lifestyle.</h3>
                        <p>Browse fresh room listings, compare essentials, and move from discovery to decision faster.</p>
                        <a href="{{ route('service.rooms') }}" class="site-nav__mega-cta">Explore all rooms</a>
                    </div>

                    <div class="site-nav__mega-grid">
                        <a href="{{ route('service.rooms') }}" class="site-nav__mega-card">
                            <i class="bi bi-building-check" aria-hidden="true"></i>
                            <span>
                                <strong>Featured rooms</strong>
                                <small>Available rooms with pricing and photos.</small>
                            </span>
                        </a>
                        <a href="{{ route('register') }}" class="site-nav__mega-card">
                            <i class="bi bi-key" aria-hidden="true"></i>
                            <span>
                                <strong>List your room</strong>
                                <small>Create an owner account and publish spaces.</small>
                            </span>
                        </a>
                        <a href="{{ url('/about') }}" class="site-nav__mega-card">
                            <i class="bi bi-shield-check" aria-hidden="true"></i>
                            <span>
                                <strong>Why RoomCha</strong>
                                <small>Simple, transparent renting for seekers and owners.</small>
                            </span>
                        </a>
                        <a href="{{ route('login') }}" class="site-nav__mega-card">
                            <i class="bi bi-person-check" aria-hidden="true"></i>
                            <span>
                                <strong>Manage account</strong>
                                <small>Sign in to manage dashboards and rooms.</small>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <a class="site-nav__link {{ $aboutActive ? 'is-active' : '' }}" href="{{ url('/about') }}" @if($aboutActive) aria-current="page" @endif>
                About
            </a>
        </div>

        <div class="site-nav__actions">
            @auth
                <a href="{{ route('dashboard') }}" class="site-nav__ghost">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="site-nav__logout">
                    @csrf
                    <button type="submit" class="site-nav__cta">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="site-nav__ghost">Sign in</a>
                <a href="{{ route('register') }}" class="site-nav__cta">Get started</a>
            @endauth
        </div>

        <button class="site-nav__toggle" type="button" data-nav-open aria-controls="mobile-navigation" aria-expanded="false">
            <span class="site-nav__toggle-line"></span>
            <span class="site-nav__toggle-line"></span>
            <span class="site-nav__toggle-line"></span>
            <span class="visually-hidden">Open navigation</span>
        </button>
    </div>
</nav>

<div class="site-drawer" data-mobile-drawer aria-hidden="true">
    <div class="site-drawer__overlay" data-nav-close></div>

    <aside class="site-drawer__panel" id="mobile-navigation" role="dialog" aria-modal="true" aria-label="Mobile navigation">
        <div class="site-drawer__header">
            <a class="site-nav__brand" href="{{ url('/') }}" aria-label="RoomCha home">
                <span class="site-nav__brand-mark">R</span>
                <span>
                    <span class="site-nav__brand-name">RoomCha</span>
                    <span class="site-nav__brand-tagline">Find rooms with confidence</span>
                </span>
            </a>

            <button class="site-drawer__close" type="button" data-nav-close aria-label="Close navigation">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            </button>
        </div>

        <div class="site-drawer__body">
            <a class="site-drawer__link {{ $homeActive ? 'is-active' : '' }}" href="{{ url('/') }}" @if($homeActive) aria-current="page" @endif>
                <i class="bi bi-house-door" aria-hidden="true"></i>
                Home
            </a>

            <details class="site-drawer__details" @if($roomsActive) open @endif>
                <summary class="site-drawer__summary {{ $roomsActive ? 'is-active' : '' }}">
                    <span>
                        <i class="bi bi-grid" aria-hidden="true"></i>
                        Rooms
                    </span>
                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                </summary>
                <div class="site-drawer__submenu">
                    <a href="{{ route('service.rooms') }}">Featured rooms</a>
                    <a href="{{ route('register') }}">List your room</a>
                    <a href="{{ route('login') }}">Manage account</a>
                </div>
            </details>

            <a class="site-drawer__link {{ $aboutActive ? 'is-active' : '' }}" href="{{ url('/about') }}" @if($aboutActive) aria-current="page" @endif>
                <i class="bi bi-info-circle" aria-hidden="true"></i>
                About
            </a>
        </div>

        <div class="site-drawer__footer">
            @auth
                <a href="{{ route('dashboard') }}" class="site-drawer__button site-drawer__button--secondary">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="site-drawer__button">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="site-drawer__button site-drawer__button--secondary">Sign in</a>
                <a href="{{ route('register') }}" class="site-drawer__button">Create account</a>
            @endauth
        </div>
    </aside>
</div>
