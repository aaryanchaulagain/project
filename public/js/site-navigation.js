document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const nav = document.querySelector('[data-site-nav]');
    const drawer = document.querySelector('[data-mobile-drawer]');
    const openButton = document.querySelector('[data-nav-open]');
    const closeButtons = document.querySelectorAll('[data-nav-close]');
    const megaTriggers = document.querySelectorAll('[data-mega-trigger]');

    const setScrolledState = () => {
        if (!nav) {
            return;
        }

        nav.classList.toggle('is-scrolled', window.scrollY > 8);
    };

    const closeMegaMenus = (exceptTrigger = null) => {
        megaTriggers.forEach((trigger) => {
            if (trigger === exceptTrigger) {
                return;
            }

            const menu = trigger.parentElement?.querySelector('[data-mega-menu]');
            trigger.setAttribute('aria-expanded', 'false');
            menu?.classList.remove('is-open');
        });
    };

    const closeDrawer = () => {
        if (!drawer || !openButton) {
            return;
        }

        drawer.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        openButton.setAttribute('aria-expanded', 'false');
        body.classList.remove('nav-lock');
    };

    const openDrawer = () => {
        if (!drawer || !openButton) {
            return;
        }

        closeMegaMenus();
        drawer.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        openButton.setAttribute('aria-expanded', 'true');
        body.classList.add('nav-lock');
    };

    setScrolledState();
    window.addEventListener('scroll', setScrolledState, { passive: true });

    megaTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.stopPropagation();

            const menu = trigger.parentElement?.querySelector('[data-mega-menu]');
            const willOpen = trigger.getAttribute('aria-expanded') !== 'true';

            closeMegaMenus(trigger);
            trigger.setAttribute('aria-expanded', String(willOpen));
            menu?.classList.toggle('is-open', willOpen);
        });
    });

    document.addEventListener('click', (event) => {
        const target = event.target;

        if (!(target instanceof Element) || !target.closest('.site-nav__item--mega')) {
            closeMegaMenus();
        }
    });

    openButton?.addEventListener('click', openDrawer);
    closeButtons.forEach((button) => button.addEventListener('click', closeDrawer));

    drawer?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeDrawer);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        closeDrawer();
        closeMegaMenus();
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 992) {
            closeDrawer();
        }
    });
});
