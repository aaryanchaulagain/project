@extends($layout ?? 'layouts.site')

@section('title', $title ?? $brandName ?? 'Advisory Group')

@section('content')
    <section class="page-hero">
        @isset($eyebrow)
            <p class="page-eyebrow">{{ $eyebrow }}</p>
        @endisset

        <h1>{{ $title }}</h1>

        @isset($summary)
            <p class="page-summary">{{ $summary }}</p>
        @endisset
    </section>

    @if (!empty($cards))
        <section class="content-grid" aria-label="{{ $title }} details">
            @foreach ($cards as $card)
                <article class="content-card">
                    <h2>{{ $card['title'] }}</h2>
                    <p>{{ $card['description'] }}</p>

                    @if (!empty($card['href']))
                        <a href="{{ $card['href'] }}">Learn more</a>
                    @endif
                </article>
            @endforeach
        </section>
    @endif
@endsection
