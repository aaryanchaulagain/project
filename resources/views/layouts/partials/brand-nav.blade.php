@php
    $mainLinks = [
        ['label' => 'Home', 'href' => route('public.home'), 'active' => request()->routeIs('public.home')],
        ['label' => 'About', 'href' => route('public.about'), 'active' => request()->routeIs('public.about')],
        ['label' => 'Services', 'href' => route('public.services'), 'active' => request()->routeIs('public.services')],
        ['label' => 'Contact', 'href' => route('public.contact'), 'active' => request()->routeIs('public.contact')],
    ];

    $brandLinks = [
        ['label' => 'Associates', 'href' => route('associates.index'), 'active' => request()->routeIs('associates.*')],
        ['label' => 'Wealth', 'href' => route('wealth.index'), 'active' => request()->routeIs('wealth.*')],
    ];
@endphp

<nav class="brand-nav">
    <a class="brand-mark" href="{{ route('public.home') }}" aria-label="{{ $brandName }} home">
        <span class="brand-mark__name">{{ $brandName }}</span>
        <span class="brand-mark__tagline">{{ $brandTagline }}</span>
    </a>

    <div class="brand-nav__links" aria-label="Primary navigation">
        @foreach ($mainLinks as $link)
            <a class="{{ $link['active'] ? 'is-active' : '' }}" href="{{ $link['href'] }}">{{ $link['label'] }}</a>
        @endforeach

        <span class="brand-nav__divider" aria-hidden="true"></span>

        @foreach ($brandLinks as $link)
            <a class="{{ $link['active'] ? 'is-active' : '' }}" href="{{ $link['href'] }}">{{ $link['label'] }}</a>
        @endforeach
    </div>
</nav>
