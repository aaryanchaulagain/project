@props([
    'eyebrow' => 'Questions answered',
    'title' => 'Enterprise-ready answers before the first meeting',
    'description' => 'Use this accordion to reduce buying friction and answer common implementation, security, or pricing questions.',
    'faqs' => [
        [
            'question' => 'Can these components be reused across multiple pages?',
            'answer' => 'Yes. They are anonymous Blade components, so you can include them anywhere in your Laravel views and pass different props for each page.',
        ],
        [
            'question' => 'Do the interactive sections require a frontend framework?',
            'answer' => 'No. The slider and counters use lightweight vanilla JavaScript that is loaded once when a component appears on the page.',
        ],
        [
            'question' => 'Can the design be customized?',
            'answer' => 'Yes. The shared asset partial uses CSS variables and scoped enterprise UI classes so branding can be adjusted in one place.',
        ],
    ],
])

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--surface']) }}>
    <div class="eui-container">
        <div class="eui-section__header">
            <span class="eui-eyebrow">{{ $eyebrow }}</span>
            <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
            <p class="eui-copy">{{ $description }}</p>
        </div>

        <div class="eui-faq">
            @foreach($faqs as $faq)
                <details @if($loop->first) open @endif>
                    <summary>{{ $faq['question'] ?? '' }}</summary>
                    <p>{{ $faq['answer'] ?? '' }}</p>
                </details>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
