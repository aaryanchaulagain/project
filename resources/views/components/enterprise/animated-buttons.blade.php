@props([
    'label' => 'Action set',
    'buttons' => [
        ['label' => 'Primary action', 'href' => '#', 'variant' => 'primary'],
        ['label' => 'Secondary action', 'href' => '#', 'variant' => 'secondary'],
        ['label' => 'Quiet action', 'href' => '#', 'variant' => 'ghost'],
    ],
])

@include('components.enterprise.partials.assets')

<div {{ $attributes->merge(['class' => 'enterprise-ui eui-button-showcase']) }} aria-label="{{ $label }}">
    @foreach($buttons as $button)
        @php
            $variant = in_array(($button['variant'] ?? 'primary'), ['primary', 'secondary', 'ghost'], true)
                ? $button['variant']
                : 'primary';
        @endphp

        @if(!empty($button['href']))
            <a class="eui-button eui-button--{{ $variant }}" href="{{ $button['href'] }}">
                {{ $button['label'] ?? 'Learn more' }}
                @if(($button['showArrow'] ?? true) !== false)
                    <span aria-hidden="true">-&gt;</span>
                @endif
            </a>
        @else
            <button class="eui-button eui-button--{{ $variant }}" type="{{ $button['type'] ?? 'button' }}">
                {{ $button['label'] ?? 'Continue' }}
                @if(($button['showArrow'] ?? true) !== false)
                    <span aria-hidden="true">-&gt;</span>
                @endif
            </button>
        @endif
    @endforeach

    {{ $slot }}
</div>
