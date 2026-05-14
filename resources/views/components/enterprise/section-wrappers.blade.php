@props([
    'variant' => 'light',
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'contained' => true,
])

@php
    $variantClass = in_array($variant, ['light', 'dark', 'surface', 'gradient'], true)
        ? 'eui-section--' . $variant
        : 'eui-section--light';
@endphp

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section ' . $variantClass]) }}>
    <div class="{{ $contained ? 'eui-container' : '' }}">
        @if($eyebrow || $title || $description)
            <div class="eui-section__header">
                @if($eyebrow)
                    <span class="eui-eyebrow">{{ $eyebrow }}</span>
                @endif

                @if($title)
                    <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
                @endif

                @if($description)
                    <p class="eui-copy">{{ $description }}</p>
                @endif
            </div>
        @endif

        {{ $slot }}
    </div>
</section>
