<footer class="brand-footer">
    <div>
        <strong>{{ $brandName }}</strong>
        <p>{{ $brandTagline }}</p>
    </div>

    <div class="brand-footer__links">
        <a href="{{ route('public.services') }}">Services</a>
        <a href="{{ route('associates.index') }}">Associates</a>
        <a href="{{ route('wealth.index') }}">Wealth</a>
        <a href="{{ route('public.contact') }}">Contact</a>
    </div>
</footer>
