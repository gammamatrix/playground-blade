@section('nav-banner')
    <div class="flex-grow-1 text-center">
        @if (Route::has('home'))
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ __(config('app.name')) }}
            </a>
        @endif
    </div>
@endsection
@section('nav-user-menu')
    @guest
        @if (Route::has('login'))
            <div class="dropdown-item">
                <a class="nav-link" href="{{ route('login') }}">
                    {{ __('Sign in') }}
                </a>
            </div>
        @endif
    @else
        <div class="dropdown-item">
            {{ Auth::user()->name }}
        </div>
        @if (Route::has('home'))
            <a class="dropdown-item" href="{{ route('home') }}">
                {{ __('Home') }}
            </a>
        @endif
        <a class="dropdown-item" href="{{ route('logout', ['redirectTo' => url()->current()]) }}" onclick="localStorage.clear()">
            {{ __('Logout') }}
        </a>
    @endguest
@endsection
