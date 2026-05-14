@once
    <style>
        :root {
            --eui-ink: #0f172a;
            --eui-muted: #64748b;
            --eui-line: rgba(148, 163, 184, 0.24);
            --eui-surface: rgba(255, 255, 255, 0.86);
            --eui-surface-strong: #ffffff;
            --eui-brand: #2563eb;
            --eui-brand-strong: #1d4ed8;
            --eui-accent: #14b8a6;
            --eui-gold: #f59e0b;
            --eui-radius-xl: 30px;
            --eui-radius-lg: 22px;
            --eui-shadow-sm: 0 16px 40px rgba(15, 23, 42, 0.08);
            --eui-shadow-lg: 0 30px 80px rgba(15, 23, 42, 0.16);
        }

        .enterprise-ui,
        .enterprise-ui * {
            box-sizing: border-box;
        }

        .enterprise-ui {
            color: var(--eui-ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .eui-section {
            isolation: isolate;
            overflow: hidden;
            padding: clamp(4rem, 8vw, 7rem) 1.25rem;
            position: relative;
        }

        .eui-section--light {
            background:
                radial-gradient(circle at 18% 18%, rgba(37, 99, 235, 0.12), transparent 28rem),
                linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .eui-section--dark {
            background:
                radial-gradient(circle at 80% 10%, rgba(20, 184, 166, 0.28), transparent 25rem),
                linear-gradient(135deg, #020617 0%, #0f172a 52%, #111827 100%);
            color: #f8fafc;
        }

        .eui-section--surface {
            background: #ffffff;
        }

        .eui-section--gradient {
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.18), transparent 28rem),
                radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.14), transparent 30rem),
                #f8fafc;
        }

        .eui-container {
            margin: 0 auto;
            max-width: 1180px;
            position: relative;
            width: 100%;
            z-index: 1;
        }

        .eui-section__header {
            margin: 0 auto clamp(2rem, 5vw, 3.5rem);
            max-width: 760px;
            text-align: center;
        }

        .eui-eyebrow {
            align-items: center;
            background: rgba(37, 99, 235, 0.1);
            border: 1px solid rgba(37, 99, 235, 0.16);
            border-radius: 999px;
            color: var(--eui-brand-strong);
            display: inline-flex;
            font-size: 0.78rem;
            font-weight: 800;
            gap: 0.45rem;
            letter-spacing: 0.12em;
            margin-bottom: 1rem;
            padding: 0.48rem 0.8rem;
            text-transform: uppercase;
        }

        .eui-section--dark .eui-eyebrow,
        .eui-hero .eui-eyebrow {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.16);
            color: #bfdbfe;
        }

        .eui-heading {
            font-size: clamp(2rem, 5vw, 4.6rem);
            font-weight: 900;
            letter-spacing: -0.055em;
            line-height: 0.98;
            margin: 0;
        }

        .eui-heading--md {
            font-size: clamp(1.85rem, 4vw, 3.2rem);
            line-height: 1.05;
        }

        .eui-copy {
            color: var(--eui-muted);
            font-size: clamp(1rem, 2vw, 1.18rem);
            line-height: 1.75;
            margin: 1.1rem 0 0;
        }

        .eui-section--dark .eui-copy,
        .eui-hero .eui-copy,
        .eui-cta .eui-copy {
            color: rgba(248, 250, 252, 0.78);
        }

        .eui-grid {
            display: grid;
            gap: 1.25rem;
        }

        .eui-grid--2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .eui-grid--3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .eui-grid--4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .eui-card {
            background: var(--eui-surface);
            border: 1px solid var(--eui-line);
            border-radius: var(--eui-radius-lg);
            box-shadow: var(--eui-shadow-sm);
            position: relative;
        }

        .eui-card--lift {
            transform: translateY(0);
            transition: border-color 220ms ease, box-shadow 220ms ease, transform 220ms ease;
        }

        .eui-card--lift:hover {
            border-color: rgba(37, 99, 235, 0.24);
            box-shadow: var(--eui-shadow-lg);
            transform: translateY(-6px);
        }

        .eui-icon {
            align-items: center;
            background:
                linear-gradient(135deg, rgba(37, 99, 235, 0.14), rgba(20, 184, 166, 0.14)),
                #ffffff;
            border: 1px solid rgba(37, 99, 235, 0.16);
            border-radius: 18px;
            color: var(--eui-brand-strong);
            display: inline-flex;
            font-size: 1.35rem;
            height: 3.25rem;
            justify-content: center;
            width: 3.25rem;
        }

        .eui-actions {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .eui-button {
            align-items: center;
            border: 0;
            border-radius: 999px;
            cursor: pointer;
            display: inline-flex;
            font-weight: 800;
            gap: 0.55rem;
            justify-content: center;
            min-height: 3.15rem;
            overflow: hidden;
            padding: 0.9rem 1.35rem;
            position: relative;
            text-decoration: none;
            transition: box-shadow 200ms ease, color 200ms ease, transform 200ms ease;
        }

        .eui-button::before {
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.42), transparent);
            content: "";
            inset: 0 auto 0 -80%;
            position: absolute;
            transform: skewX(-18deg);
            transition: left 450ms ease;
            width: 56%;
        }

        .eui-button:hover {
            transform: translateY(-2px);
        }

        .eui-button:hover::before {
            left: 130%;
        }

        .eui-button--primary {
            background: linear-gradient(135deg, var(--eui-brand), var(--eui-accent));
            box-shadow: 0 16px 34px rgba(37, 99, 235, 0.3);
            color: #ffffff;
        }

        .eui-button--secondary {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(15, 23, 42, 0.1);
            color: var(--eui-ink);
        }

        .eui-button--ghost {
            background: rgba(15, 23, 42, 0.06);
            color: var(--eui-ink);
        }

        .eui-section--dark .eui-button--secondary,
        .eui-cta .eui-button--secondary,
        .eui-hero .eui-button--secondary {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.18);
            color: #ffffff;
        }

        .eui-hero {
            background:
                radial-gradient(circle at 14% 18%, rgba(59, 130, 246, 0.34), transparent 28rem),
                radial-gradient(circle at 82% 18%, rgba(20, 184, 166, 0.22), transparent 30rem),
                linear-gradient(135deg, #020617 0%, #0f172a 54%, #111827 100%);
            color: #ffffff;
            min-height: 720px;
            padding: clamp(5rem, 8vw, 8rem) 1.25rem;
        }

        .eui-hero__grid {
            align-items: center;
            display: grid;
            gap: clamp(2rem, 5vw, 4rem);
            grid-template-columns: minmax(0, 1.02fr) minmax(320px, 0.88fr);
        }

        .eui-hero__content {
            max-width: 710px;
        }

        .eui-hero__visual {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.06));
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 36px;
            box-shadow: var(--eui-shadow-lg);
            min-height: 430px;
            overflow: hidden;
            padding: 0.8rem;
            position: relative;
        }

        .eui-hero__visual img {
            border-radius: 28px;
            display: block;
            height: 100%;
            min-height: 405px;
            object-fit: cover;
            width: 100%;
        }

        .eui-hero__panel {
            backdrop-filter: blur(18px);
            background: rgba(15, 23, 42, 0.74);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 24px;
            bottom: 1.65rem;
            left: 1.65rem;
            padding: 1.15rem;
            position: absolute;
            right: 1.65rem;
        }

        .eui-hero__metrics {
            display: grid;
            gap: 0.8rem;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: clamp(2rem, 4vw, 3rem);
        }

        .eui-hero__metric,
        .eui-stat-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 20px;
            padding: 1rem;
        }

        .eui-hero__metric strong,
        .eui-stat-card strong {
            display: block;
            font-size: clamp(1.55rem, 3vw, 2.35rem);
            letter-spacing: -0.04em;
            line-height: 1;
        }

        .eui-hero__metric span,
        .eui-stat-card span {
            color: rgba(248, 250, 252, 0.68);
            display: block;
            font-size: 0.88rem;
            margin-top: 0.4rem;
        }

        .eui-service-card,
        .eui-feature-card {
            padding: 1.45rem;
        }

        .eui-service-card h3,
        .eui-feature-card h3 {
            font-size: 1.18rem;
            font-weight: 850;
            letter-spacing: -0.02em;
            margin: 1.15rem 0 0.55rem;
        }

        .eui-service-card p,
        .eui-feature-card p {
            color: var(--eui-muted);
            line-height: 1.65;
            margin: 0;
        }

        .eui-card-link {
            color: var(--eui-brand-strong);
            display: inline-flex;
            font-weight: 800;
            gap: 0.4rem;
            margin-top: 1rem;
            text-decoration: none;
        }

        .eui-stats {
            background: linear-gradient(135deg, #020617 0%, #111827 100%);
            border-radius: var(--eui-radius-xl);
            color: #ffffff;
            overflow: hidden;
            padding: clamp(1.5rem, 4vw, 2.6rem);
            position: relative;
        }

        .eui-stats::after {
            background: radial-gradient(circle, rgba(20, 184, 166, 0.32), transparent 28rem);
            content: "";
            height: 24rem;
            position: absolute;
            right: -9rem;
            top: -12rem;
            width: 24rem;
        }

        .eui-stats__grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            position: relative;
            z-index: 1;
        }

        .eui-testimonial {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border: 1px solid var(--eui-line);
            border-radius: var(--eui-radius-xl);
            box-shadow: var(--eui-shadow-sm);
            overflow: hidden;
            padding: clamp(1.4rem, 4vw, 2.4rem);
        }

        .eui-testimonial__track {
            display: grid;
        }

        .eui-testimonial__slide {
            display: none;
            gap: 1.25rem;
            grid-column: 1;
            grid-row: 1;
        }

        .eui-testimonial__slide.is-active {
            display: grid;
        }

        .eui-testimonial blockquote {
            color: #1e293b;
            font-size: clamp(1.35rem, 3vw, 2rem);
            font-weight: 750;
            letter-spacing: -0.035em;
            line-height: 1.25;
            margin: 0;
        }

        .eui-testimonial__meta {
            align-items: center;
            display: flex;
            gap: 0.8rem;
            margin-top: 1.6rem;
        }

        .eui-avatar {
            align-items: center;
            background: linear-gradient(135deg, var(--eui-brand), var(--eui-accent));
            border-radius: 999px;
            color: #ffffff;
            display: inline-flex;
            font-weight: 900;
            height: 3rem;
            justify-content: center;
            width: 3rem;
        }

        .eui-slider-controls {
            align-items: center;
            display: flex;
            gap: 0.65rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .eui-slider-button {
            align-items: center;
            background: #ffffff;
            border: 1px solid var(--eui-line);
            border-radius: 999px;
            color: var(--eui-ink);
            cursor: pointer;
            display: inline-flex;
            height: 2.75rem;
            justify-content: center;
            transition: transform 180ms ease, box-shadow 180ms ease;
            width: 2.75rem;
        }

        .eui-slider-button:hover {
            box-shadow: var(--eui-shadow-sm);
            transform: translateY(-2px);
        }

        .eui-faq {
            display: grid;
            gap: 0.85rem;
        }

        .eui-faq details {
            background: #ffffff;
            border: 1px solid var(--eui-line);
            border-radius: 20px;
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.05);
            padding: 1rem 1.2rem;
        }

        .eui-faq summary {
            cursor: pointer;
            font-weight: 850;
            list-style: none;
        }

        .eui-faq summary::-webkit-details-marker {
            display: none;
        }

        .eui-faq summary::after {
            color: var(--eui-brand);
            content: "+";
            float: right;
            font-size: 1.35rem;
            line-height: 1;
        }

        .eui-faq details[open] summary::after {
            content: "-";
        }

        .eui-faq p {
            color: var(--eui-muted);
            line-height: 1.7;
            margin: 0.8rem 0 0;
        }

        .eui-contact {
            align-items: stretch;
            display: grid;
            gap: 1.25rem;
            grid-template-columns: 0.92fr 1.08fr;
        }

        .eui-contact__aside,
        .eui-contact__form {
            border-radius: var(--eui-radius-xl);
            padding: clamp(1.35rem, 4vw, 2rem);
        }

        .eui-contact__aside {
            background:
                radial-gradient(circle at 20% 20%, rgba(20, 184, 166, 0.32), transparent 18rem),
                linear-gradient(135deg, #020617, #0f172a);
            color: #ffffff;
        }

        .eui-contact__form {
            background: #ffffff;
            border: 1px solid var(--eui-line);
            box-shadow: var(--eui-shadow-sm);
        }

        .eui-field {
            display: grid;
            gap: 0.45rem;
            margin-bottom: 1rem;
        }

        .eui-field label {
            color: #334155;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .eui-field input,
        .eui-field select,
        .eui-field textarea {
            background: #f8fafc;
            border: 1px solid rgba(148, 163, 184, 0.35);
            border-radius: 16px;
            color: var(--eui-ink);
            font: inherit;
            min-height: 3.1rem;
            padding: 0.85rem 1rem;
            transition: background 180ms ease, border-color 180ms ease, box-shadow 180ms ease;
            width: 100%;
        }

        .eui-field textarea {
            min-height: 9rem;
            resize: vertical;
        }

        .eui-field input:focus,
        .eui-field select:focus,
        .eui-field textarea:focus {
            background: #ffffff;
            border-color: rgba(37, 99, 235, 0.7);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
            outline: none;
        }

        .eui-feature-card {
            overflow: hidden;
        }

        .eui-feature-card::after {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.16), rgba(20, 184, 166, 0.14));
            border-radius: 999px;
            content: "";
            height: 8rem;
            position: absolute;
            right: -4rem;
            top: -4rem;
            width: 8rem;
        }

        .eui-kicker {
            color: var(--eui-brand-strong);
            font-size: 0.78rem;
            font-weight: 850;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .eui-button-showcase {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
        }

        @media (max-width: 980px) {
            .eui-grid--3,
            .eui-grid--4,
            .eui-stats__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .eui-hero__grid,
            .eui-contact {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .eui-grid--2,
            .eui-grid--3,
            .eui-grid--4,
            .eui-stats__grid,
            .eui-hero__metrics {
                grid-template-columns: 1fr;
            }

            .eui-hero {
                min-height: auto;
            }

            .eui-hero__visual {
                min-height: 320px;
            }

            .eui-hero__visual img {
                min-height: 300px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .eui-card--lift,
            .eui-button,
            .eui-slider-button {
                transition: none;
            }
        }
    </style>

    <script>
        (function () {
            if (window.__enterpriseUiReady) {
                return;
            }

            window.__enterpriseUiReady = true;

            function animateCounter(element) {
                if (element.dataset.euiCounted === 'true') {
                    return;
                }

                element.dataset.euiCounted = 'true';

                var target = Number(element.dataset.to || element.textContent || 0);
                var suffix = element.dataset.suffix || '';
                var prefix = element.dataset.prefix || '';
                var duration = Number(element.dataset.duration || 1100);
                var start = null;

                if (!window.requestAnimationFrame || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    element.textContent = prefix + target.toLocaleString() + suffix;
                    return;
                }

                function tick(timestamp) {
                    if (!start) {
                        start = timestamp;
                    }

                    var progress = Math.min((timestamp - start) / duration, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    var value = Math.round(target * eased);
                    element.textContent = prefix + value.toLocaleString() + suffix;

                    if (progress < 1) {
                        window.requestAnimationFrame(tick);
                    }
                }

                window.requestAnimationFrame(tick);
            }

            function initCounters(root) {
                var counters = Array.prototype.slice.call(root.querySelectorAll('[data-eui-counter]'));

                if (!counters.length) {
                    return;
                }

                if (!('IntersectionObserver' in window)) {
                    counters.forEach(animateCounter);
                    return;
                }

                var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.35 });

                counters.forEach(function (counter) {
                    observer.observe(counter);
                });
            }

            function initSliders(root) {
                var sliders = Array.prototype.slice.call(root.querySelectorAll('[data-eui-slider]'));

                sliders.forEach(function (slider) {
                    if (slider.dataset.euiSliderReady === 'true') {
                        return;
                    }

                    slider.dataset.euiSliderReady = 'true';

                    var slides = Array.prototype.slice.call(slider.querySelectorAll('[data-eui-slide]'));
                    var previous = slider.querySelector('[data-eui-prev]');
                    var next = slider.querySelector('[data-eui-next]');
                    var index = 0;

                    function show(nextIndex) {
                        if (!slides.length) {
                            return;
                        }

                        index = (nextIndex + slides.length) % slides.length;
                        slides.forEach(function (slide, slideIndex) {
                            slide.classList.toggle('is-active', slideIndex === index);
                            slide.setAttribute('aria-hidden', slideIndex === index ? 'false' : 'true');
                        });
                    }

                    if (previous) {
                        previous.addEventListener('click', function () {
                            show(index - 1);
                        });
                    }

                    if (next) {
                        next.addEventListener('click', function () {
                            show(index + 1);
                        });
                    }

                    show(0);
                });
            }

            function initEnterpriseUi(root) {
                initCounters(root || document);
                initSliders(root || document);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function () {
                    initEnterpriseUi(document);
                });
            } else {
                initEnterpriseUi(document);
            }

            document.addEventListener('enterprise-ui:init', function (event) {
                initEnterpriseUi(event.detail && event.detail.root ? event.detail.root : document);
            });
        })();
    </script>
@endonce
