@props([
    'eyebrow' => 'Customer confidence',
    'title' => 'Boardroom-ready stories from teams that move fast',
    'description' => 'A lightweight testimonial slider for executive quotes, customer proof, and implementation wins.',
    'testimonials' => [
        [
            'quote' => 'The new experience helped our team tell a sharper story and turn executive traffic into qualified conversations.',
            'name' => 'Avery Stone',
            'role' => 'VP of Growth, Northstar Systems',
            'initials' => 'AS',
        ],
        [
            'quote' => 'We finally have premium page sections that feel consistent across campaigns without slowing delivery.',
            'name' => 'Maya Chen',
            'role' => 'Director of Marketing Operations, ScaleForge',
            'initials' => 'MC',
        ],
        [
            'quote' => 'The components gave our product and sales teams a reusable language for launches, proof points, and CTAs.',
            'name' => 'Jordan Reed',
            'role' => 'Chief Product Officer, Meridian Cloud',
            'initials' => 'JR',
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

        <div class="eui-testimonial" data-eui-slider>
            <div class="eui-testimonial__track">
                @foreach($testimonials as $testimonial)
                    <article class="eui-testimonial__slide" data-eui-slide>
                        <blockquote>
                            &ldquo;{{ $testimonial['quote'] ?? '' }}&rdquo;
                        </blockquote>

                        <div class="eui-testimonial__meta">
                            <span class="eui-avatar" aria-hidden="true">{{ $testimonial['initials'] ?? 'ET' }}</span>
                            <div>
                                <strong>{{ $testimonial['name'] ?? '' }}</strong>
                                <div style="color: var(--eui-muted);">{{ $testimonial['role'] ?? '' }}</div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="eui-slider-controls" aria-label="Testimonial controls">
                <button class="eui-slider-button" type="button" data-eui-prev aria-label="Previous testimonial">
                    <span aria-hidden="true">&lt;</span>
                </button>
                <button class="eui-slider-button" type="button" data-eui-next aria-label="Next testimonial">
                    <span aria-hidden="true">&gt;</span>
                </button>
            </div>
        </div>

        {{ $slot }}
    </div>
</section>
