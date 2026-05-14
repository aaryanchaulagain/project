@props([
    'eyebrow' => 'Contact sales',
    'title' => 'Start a focused conversation with your next best lead',
    'description' => 'Use this premium contact form for demos, consultation requests, enterprise intake, or partnership inquiries.',
    'action' => '#',
    'method' => 'POST',
    'submitLabel' => 'Send request',
    'asideTitle' => 'What happens next?',
    'asideItems' => [
        'A specialist reviews your goals and timeline.',
        'You receive a tailored recommendation for the next step.',
        'Your team gets a clear implementation path.',
    ],
    'fields' => [
        ['name' => 'name', 'label' => 'Full name', 'type' => 'text', 'placeholder' => 'Jane Smith', 'required' => true],
        ['name' => 'email', 'label' => 'Work email', 'type' => 'email', 'placeholder' => 'jane@company.com', 'required' => true],
        ['name' => 'company', 'label' => 'Company', 'type' => 'text', 'placeholder' => 'Company name', 'required' => false],
        ['name' => 'message', 'label' => 'How can we help?', 'type' => 'textarea', 'placeholder' => 'Tell us about your goals...', 'required' => true],
    ],
])

@php
    $normalizedMethod = strtoupper($method);
    $formMethod = in_array($normalizedMethod, ['GET', 'POST'], true) ? $normalizedMethod : 'POST';
@endphp

@include('components.enterprise.partials.assets')

<section {{ $attributes->merge(['class' => 'enterprise-ui eui-section eui-section--light']) }} id="contact">
    <div class="eui-container">
        <div class="eui-contact">
            <aside class="eui-contact__aside">
                <span class="eui-eyebrow">{{ $eyebrow }}</span>
                <h2 class="eui-heading eui-heading--md">{{ $title }}</h2>
                <p class="eui-copy">{{ $description }}</p>

                <div style="display: grid; gap: 0.85rem; margin-top: 2rem;">
                    <strong>{{ $asideTitle }}</strong>
                    @foreach($asideItems as $item)
                        <div style="align-items: flex-start; display: flex; gap: 0.65rem;">
                            <span aria-hidden="true" style="color: var(--eui-accent); font-weight: 900;">OK</span>
                            <span style="color: rgba(248, 250, 252, 0.78);">{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </aside>

            <form class="eui-contact__form" action="{{ $action }}" method="{{ $formMethod }}">
                @if($formMethod !== 'GET')
                    @csrf
                @endif

                @if(!in_array($normalizedMethod, ['GET', 'POST'], true))
                    @method($normalizedMethod)
                @endif

                @foreach($fields as $field)
                    <div class="eui-field">
                        <label for="{{ $field['name'] ?? 'field-' . $loop->index }}">
                            {{ $field['label'] ?? ucfirst($field['name'] ?? 'Field') }}
                        </label>

                        @if(($field['type'] ?? 'text') === 'textarea')
                            <textarea
                                id="{{ $field['name'] ?? 'field-' . $loop->index }}"
                                name="{{ $field['name'] ?? 'field_' . $loop->index }}"
                                placeholder="{{ $field['placeholder'] ?? '' }}"
                                @if(!empty($field['required'])) required @endif
                            >{{ old($field['name'] ?? '') }}</textarea>
                        @elseif(($field['type'] ?? 'text') === 'select')
                            <select
                                id="{{ $field['name'] ?? 'field-' . $loop->index }}"
                                name="{{ $field['name'] ?? 'field_' . $loop->index }}"
                                @if(!empty($field['required'])) required @endif
                            >
                                @foreach(($field['options'] ?? []) as $value => $label)
                                    <option value="{{ is_string($value) ? $value : $label }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        @else
                            <input
                                id="{{ $field['name'] ?? 'field-' . $loop->index }}"
                                name="{{ $field['name'] ?? 'field_' . $loop->index }}"
                                type="{{ $field['type'] ?? 'text' }}"
                                value="{{ old($field['name'] ?? '') }}"
                                placeholder="{{ $field['placeholder'] ?? '' }}"
                                @if(!empty($field['required'])) required @endif
                            >
                        @endif
                    </div>
                @endforeach

                <button class="eui-button eui-button--primary" type="submit">
                    {{ $submitLabel }}
                    <span aria-hidden="true">-&gt;</span>
                </button>

                {{ $slot }}
            </form>
        </div>
    </div>
</section>
