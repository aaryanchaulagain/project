@props([
    'variant' => 'light',
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'contained' => true,
])

<x-enterprise.section-wrapper :variant="$variant" :eyebrow="$eyebrow" :title="$title" :description="$description" :contained="$contained" {{ $attributes }}>
    {{ $slot }}
</x-enterprise.section-wrapper>
