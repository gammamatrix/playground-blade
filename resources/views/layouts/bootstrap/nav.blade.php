<nav class="navbar navbar-expand-sm bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{!! __(config('playground-blade.app.url')) !!}">
            {{ __(config('playground-blade.app.name')) }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                @if (Route::has('home'))
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                @endif
                @if (Route::has('sitemap') && !empty('playground.sitemap.enable'))

                    @auth
                        @if (!empty('playground.sitemap.user'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sitemap') }}">
                                    {{ __('Sitemap') }}
                                </a>
                            </li>
                        @endif
                    @else
                        @if (!empty('playground.sitemap.guest'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sitemap') }}">
                                    {{ __('Sitemap') }}
                                </a>
                            </li>
                        @endif
                    @endauth

                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Session') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li>
                                <div class="dropdown-item">
                                    {{ Auth::user()?->name }}
                                </div>
                            </li>
                            @if (Route::has('dashboard'))
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                </li>
                            @endif
                        @endguest
                        @if (Route::has('theme'))
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <p class="ms-3 my-1 text-info">
                                    Themes
                                </p>
                            </li>
                            @php
                                $selectedTheme = Playground\Blade\Facades\Ui::theme()->bsTheme();
                            @endphp
                            @foreach (Playground\Blade\Facades\Ui::themes() as $themeKey => $_theme)
                                @continue(!$_theme->enabled() || !$_theme->label())
                                <li>
                                    <a class="dropdown-item{{ (empty($selectedTheme) && 'default' === $themeKey) || $selectedTheme === $themeKey ? ' active' : '' }}"
                                        href="{{ route('theme', ['appTheme' => $themeKey ?? '', '_return_url' => request()->url()]) }}">
                                        @if ($_theme->icon())
                                            <i class="{{ $_theme->icon() }}"></i>
                                        @endif
                                        {{ $_theme->label() }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Route::has('logout'))
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
            @if ($withSearch)
                <form class="d-flex">
                    <input class="form-control me-2" id="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        {{ __('Search') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>
