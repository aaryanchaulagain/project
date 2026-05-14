@props([
    'eyebrow' => 'Performance proof',
    'title' => 'Numbers that make the business case clear',
    'description' => 'Use animated counters to highlight measurable outcomes, operating scale, and customer confidence.',
    'stats' => [
        ['value' => 120, 'suffix' => '+', 'label' => 'Enterprise programs launched'],
        ['value' => 98, 'suffix' => '%', 'label' => 'Client satisfaction score'],
        ['value' => 24, 'suffix' => '/7', 'label' => 'Operational coverage'],
        ['value' => 3, 'prefix' => '$', 'suffix' => 'M+', 'label' => 'Pipeline influenced'],
    ],
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--surface']) }}>
    <div class="eui-container">
        <div class="eui-stats">
            <div class="eui-section__header" style="margin-bottom: 2rem;">
                <span class="eui-eyebrow">{{ $eyebrow }}</span>
                <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
                <p class="eui-copy">{{ $description }}</p>
            </div>

            <div class="eui-stats__grid" aria-label="Business statistics">
                @foreach($stats as $stat)
                    <div class="eui-stat-card">
                        <strong
                            data-eui-counter
                            data-to="{{ $stat['value'] ?? 0 }}"
                            data-prefix="{{ $stat['prefix'] ?? '' }}"
                            data-suffix="{{ $stat['suffix'] ?? '' }}"
                            data-duration="{{ $stat['duration'] ?? 1100 }}"
                        >
                            {{ $stat['prefix'] ?? '' }}0{{ $stat['suffix'] ?? '' }}
                        </strong>
                        <span>{{ $stat['label'] ?? '' }}</span>
                    </div>
                @endforeach
            </div>

            {{ $slot }}
        </div>
    </div>
</section>
