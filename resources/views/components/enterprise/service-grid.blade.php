@props([
    'eyebrow' => 'Enterprise services',
    'title' => 'High-impact services packaged for modern teams',
    'description' => 'A premium grid for positioning strategic capabilities, implementation offers, or managed services.',
    'columns' => 3,
    'services' => [
        [
            'icon' => 'bi bi-buildings',
            'title' => 'Digital transformation',
            'description' => 'Modernize operations with scalable experiences, governance, and measurable adoption paths.',
            'href' => '#',
            'linkLabel' => 'Learn more',
        ],
        [
            'icon' => 'bi bi-shield-check',
            'title' => 'Trust and compliance',
            'description' => 'Communicate security, compliance, and reliability benefits with executive clarity.',
            'href' => '#',
            'linkLabel' => 'Learn more',
        ],
        [
            'icon' => 'bi bi-graph-up-arrow',
            'title' => 'Revenue acceleration',
            'description' => 'Convert visitors into qualified pipeline through sharper messaging and guided calls to action.',
            'href' => '#',
            'linkLabel' => 'Learn more',
        ],
    ],
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--light']) }} id="services">
    <div class="eui-container">
        <div class="eui-section__header">
            <span class="eui-eyebrow">{{ $eyebrow }}</span>
            <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
            <p class="eui-copy">{{ $description }}</p>
        </div>

        <div class="eui-grid eui-grid--{{ $columns }}">
            @foreach($services as $service)
                <article class="eui-card eui-card--lift eui-service-card">
                    <span class="eui-icon" aria-hidden="true">
                        <i class="{{ $service['icon'] ?? 'bi bi-grid' }}"></i>
                    </span>
                    <h3>{{ $service['title'] ?? '' }}</h3>
                    <p>{{ $service['description'] ?? '' }}</p>

                    @if(!empty($service['href']))
                        <a class="eui-card-link" href="{{ $service['href'] }}">
                            {{ $service['linkLabel'] ?? 'Learn more' }}
                            <span aria-hidden="true">-&gt;</span>
                        </a>
                    @endif
                </article>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
