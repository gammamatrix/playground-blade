<footer class="mt-auto py-3">
    @stack('snippet-footer-top') {{-- snippet-footer rank === {3001, 4000} --}}
    <nav class="nav nav-pills flex-column flex-sm-row">
        <span class="flex-sm-fill text-center navbar-text">
            {{ config('app.name') }}
        </span>
        @if (Route::has('sitemap') && !empty('playground.sitemap.enable'))
            @auth
                @if (!empty('playground.sitemap.user'))
                    <span class="flex-sm-fill text-center navbar-text">
                        <a href="{{ route('sitemap') }}">{{ __('Sitemap') }}</a>
                    </span>
                @endif
            @else
                @if (!empty('playground.sitemap.guest'))
                    <span class="flex-sm-fill text-center navbar-text">
                        <a href="{{ route('sitemap') }}">{{ __('Sitemap') }}</a>
                    </span>
                @endif
            @endauth
        @endif
    </nav>
    @stack('snippet-footer-bottom') {{-- snippet-footer rank === {4001, 5000} --}}
</footer>
