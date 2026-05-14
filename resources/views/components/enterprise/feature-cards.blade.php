@props([
    'eyebrow' => 'Product advantages',
    'title' => 'Feature cards for positioning premium capabilities',
    'description' => 'Showcase differentiators, product pillars, or operating benefits with flexible enterprise cards.',
    'columns' => 3,
    'features' => [
        [
            'kicker' => 'Speed',
            'icon' => 'bi bi-lightning-charge',
            'title' => 'Rapid page assembly',
            'description' => 'Compose reusable sections with consistent spacing, hierarchy, and interaction patterns.',
        ],
        [
            'kicker' => 'Clarity',
            'icon' => 'bi bi-layers',
            'title' => 'Executive storytelling',
            'description' => 'Guide buyers through outcomes, proof, and calls to action without visual clutter.',
        ],
        [
            'kicker' => 'Scale',
            'icon' => 'bi bi-diagram-3',
            'title' => 'Reusable design system',
            'description' => 'Maintain a premium look across campaigns, landing pages, and customer journeys.',
        ],
    ],
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--gradient']) }}>
    <div class="eui-container">
        <div class="eui-section__header">
            <span class="eui-eyebrow">{{ $eyebrow }}</span>
            <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
            <p class="eui-copy">{{ $description }}</p>
        </div>

        <div class="eui-grid eui-grid--{{ $columns }}">
            @foreach($features as $feature)
                <article class="eui-card eui-card--lift eui-feature-card">
                    <span class="eui-kicker">{{ $feature['kicker'] ?? 'Feature' }}</span>
                    <div style="margin-top: 1rem;">
                        <span class="eui-icon" aria-hidden="true">
                            <i class="{{ $feature['icon'] ?? 'bi bi-stars' }}"></i>
                        </span>
                    </div>
                    <h3>{{ $feature['title'] ?? '' }}</h3>
                    <p>{{ $feature['description'] ?? '' }}</p>
                </article>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
