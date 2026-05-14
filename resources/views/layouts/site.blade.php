<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', $brandName ?? 'Advisory Group')</title>
    <style>
        :root {
            --brand-bg: #f7f3ec;
            --brand-surface: #ffffff;
            --brand-ink: #17202a;
            --brand-muted: #5d6975;
            --brand-primary: #254f73;
            --brand-secondary: #b7772f;
            --brand-accent: #e9d8bd;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--brand-bg);
            color: var(--brand-ink);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
        }

        .brand-nav,
        .brand-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin: 0 auto;
            max-width: 1180px;
            padding: 24px;
        }

        .brand-mark {
            text-decoration: none;
        }

        .brand-mark__name {
            display: block;
            color: var(--brand-primary);
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .brand-mark__tagline {
            color: var(--brand-muted);
            display: block;
            font-size: 0.88rem;
            margin-top: 4px;
        }

        .brand-nav__links,
        .brand-footer__links {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .brand-nav__links a,
        .brand-footer__links a {
            border-radius: 999px;
            color: var(--brand-muted);
            font-weight: 700;
            padding: 8px 12px;
            text-decoration: none;
        }

        .brand-nav__links a:hover,
        .brand-nav__links a.is-active {
            background: var(--brand-accent);
            color: var(--brand-primary);
        }

        .brand-nav__divider {
            background: rgba(23, 32, 42, 0.2);
            height: 24px;
            width: 1px;
        }

        .page-shell {
            margin: 0 auto;
            max-width: 1180px;
            padding: 48px 24px 72px;
        }

        .page-hero {
            background: linear-gradient(135deg, var(--brand-primary), #13283a);
            border-radius: 28px;
            color: #ffffff;
            overflow: hidden;
            padding: 72px;
            position: relative;
        }

        .page-hero::after {
            background: var(--brand-secondary);
            border-radius: 50%;
            content: "";
            height: 220px;
            opacity: 0.22;
            position: absolute;
            right: -70px;
            top: -70px;
            width: 220px;
        }

        .page-eyebrow {
            color: var(--brand-accent);
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            margin: 0 0 16px;
            text-transform: uppercase;
        }

        .page-hero h1 {
            font-size: clamp(2.4rem, 5vw, 4.8rem);
            line-height: 1;
            margin: 0;
            max-width: 760px;
        }

        .page-summary {
            color: rgba(255, 255, 255, 0.84);
            font-size: 1.18rem;
            line-height: 1.7;
            margin: 24px 0 0;
            max-width: 680px;
        }

        .content-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            margin-top: 32px;
        }

        .content-card {
            background: var(--brand-surface);
            border: 1px solid rgba(23, 32, 42, 0.08);
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(23, 32, 42, 0.08);
            padding: 28px;
        }

        .content-card h2 {
            color: var(--brand-primary);
            margin: 0 0 12px;
        }

        .content-card p {
            color: var(--brand-muted);
            line-height: 1.7;
            margin: 0;
        }

        .content-card a {
            color: var(--brand-secondary);
            display: inline-block;
            font-weight: 800;
            margin-top: 20px;
            text-decoration: none;
        }

        .brand-footer {
            border-top: 1px solid rgba(23, 32, 42, 0.12);
            color: var(--brand-muted);
        }

        .brand-footer p {
            margin: 6px 0 0;
        }

        @media (max-width: 760px) {
            .brand-nav,
            .brand-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .brand-nav__divider {
                display: none;
            }

            .page-hero {
                padding: 48px 28px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.partials.brand-nav')

    <main class="page-shell">
        @yield('content')
    </main>

    @include('layouts.partials.brand-footer')
</body>
</html>
