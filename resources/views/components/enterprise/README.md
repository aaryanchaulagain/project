# Enterprise UI Blade components

Reusable anonymous Blade components live in `resources/views/components/enterprise`.

## Components

- `<x-enterprise.hero />`
- `<x-enterprise.cta />`
- `<x-enterprise.service-grid />`
- `<x-enterprise.stats-counter />`
- `<x-enterprise.testimonial-slider />`
- `<x-enterprise.faq-accordion />`
- `<x-enterprise.contact-form />`
- `<x-enterprise.feature-cards />`
- `<x-enterprise.animated-buttons />`
- `<x-enterprise.section-wrapper />`
- `<x-enterprise.section-wrappers />`

Each component includes the shared asset partial with `@once`, so styles and scripts are emitted only one time even when several components are used on the same page.

## Example

```blade
<x-enterprise.hero
    eyebrow="RoomXa for owners"
    title="Operate rooms with enterprise-grade confidence"
    description="Showcase premium room experiences, trust signals, and conversion-focused calls to action."
    primary-label="List a room"
    primary-href="/owner/register"
    secondary-label="Browse rooms"
    secondary-href="/dog"
/>

<x-enterprise.service-grid :services="[
    [
        'icon' => 'bi bi-house-check',
        'title' => 'Verified rooms',
        'description' => 'Create trust with clear, polished service cards.',
        'href' => '/dog',
        'linkLabel' => 'View rooms',
    ],
]" />

<x-enterprise.contact-form action="/contact" method="POST" />
```

## Import cleanup

Run this command after editing JavaScript entry points:

```bash
npm run fix:imports
```

The script removes repeated identical import lines from local JavaScript and TypeScript files without adding dependencies.
