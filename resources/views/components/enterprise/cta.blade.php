@props([
    'eyebrow' => 'Ready to move',
    'title' => 'Turn your next enterprise page into a revenue-ready experience',
    'description' => 'Use this focused conversion band for product launches, consultation requests, onboarding prompts, or campaign landing pages.',
    'primaryLabel' => 'Start the conversation',
    'primaryHref' => '#contact',
    'secondaryLabel' => 'Explore services',
    'secondaryHref' => '#services',
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--dark eui-cta']) }}>
    <div class="eui-container">
        <div class="eui-card" style="background: linear-gradient(135deg, rgba(37, 99, 235, 0.26), rgba(20, 184, 166, 0.16)); border-color: rgba(255, 255, 255, 0.14); border-radius: 34px; color: #ffffff; padding: clamp(1.75rem, 5vw, 3.4rem);">
            <div style="display: grid; gap: 1.5rem; grid-template-columns: minmax(0, 1fr) auto; align-items: center;">
                <div>
                    <span class="eui-eyebrow">{{ $eyebrow }}</span>
                    <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
                    <p class="eui-copy" style="max-width: 720px;">{{ $description }}</p>
                </div>

                <div class="eui-actions">
                    <a class="eui-button eui-button--primary" href="{{ $primaryHref }}">
                        {{ $primaryLabel }}
                        <span aria-hidden="true">-&gt;</span>
                    </a>
                    <a class="eui-button eui-button--secondary" href="{{ $secondaryHref }}">
                        {{ $secondaryLabel }}
                    </a>
                </div>
            </div>

            {{ $slot }}
        </div>
    </div>
</section>
