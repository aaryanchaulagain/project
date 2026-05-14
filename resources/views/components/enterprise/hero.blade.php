@props([
    'eyebrow' => 'Enterprise growth platform',
    'title' => 'Build trusted digital experiences at enterprise speed',
    'description' => 'Launch polished conversion sections, product stories, and lead capture journeys with components designed for modern B2B teams.',
    'primaryLabel' => 'Schedule a demo',
    'primaryHref' => '#contact',
    'secondaryLabel' => 'View solutions',
    'secondaryHref' => '#services',
    'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=80',
    'panelTitle' => 'Executive-ready delivery',
    'panelText' => 'Premium layouts, measurable calls to action, and responsive polish in one reusable system.',
    'stats' => [
        ['value' => '42%', 'label' => 'Faster launch cycles'],
        ['value' => '3.8x', 'label' => 'Lead engagement lift'],
        ['value' => '99.9%', 'label' => 'Design consistency'],
    ],
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-hero']) }}>
    <div class="eui-container">
        <div class="eui-hero__grid">
            <div class="eui-hero__content">
                <span class="eui-eyebrow">{{ $eyebrow }}</span>
                <h1 class="eui-heading">{{ $title }}</h1>
                <p class="eui-copy">{{ $description }}</p>

                <div class="eui-actions" style="margin-top: 2rem;">
                    <a class="eui-button eui-button--primary" href="{{ $primaryHref }}">
                        {{ $primaryLabel }}
                        <span aria-hidden="true">-&gt;</span>
                    </a>
                    <a class="eui-button eui-button--secondary" href="{{ $secondaryHref }}">
                        {{ $secondaryLabel }}
                    </a>
                </div>

                @if(!empty($stats))
                    <div class="eui-hero__metrics" aria-label="Key performance metrics">
                        @foreach($stats as $stat)
                            <div class="eui-hero__metric">
                                <strong>{{ $stat['value'] ?? '' }}</strong>
                                <span>{{ $stat['label'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="eui-hero__visual">
                <img src="{{ $image }}" alt="{{ $title }}">
                <div class="eui-hero__panel">
                    <strong>{{ $panelTitle }}</strong>
                    <p style="color: rgba(248, 250, 252, 0.72); line-height: 1.55; margin: 0.45rem 0 0;">
                        {{ $panelText }}
                    </p>
                </div>
            </div>
        </div>

        {{ $slot }}
    </div>
</section>
