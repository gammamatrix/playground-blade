@section("breadcrumbs")
    <nav aria-label="breadcrumb" class="container-fluid mt-3">
        <ol class="breadcrumb">
            @yield("form-breadcrumbs-first")
            <li class="breadcrumb-item">
                <a href="/">{{ __("Home") }}</a>
            </li>
            @yield("form-breadcrumbs-pre-module")
            <li class="breadcrumb-item">
                <a href="{{ $routeModule }}">
                    {{ __($packageInfo->module_label()) }}
                </a>
            </li>
            @yield("form-breadcrumbs-pre-index")
            <li class="breadcrumb-item">
                <a href="{{ $routeModel }}">
                    {{ __(":module_label Index", ["module_label" => $packageInfo->model_label()]) }}
                </a>
            </li>
            @yield("form-breadcrumbs-post-index")
            @if ($routeShow)
                @yield("form-breadcrumbs-pre-show")
                <li class="breadcrumb-item">
                    <a href="{{ $routeShow }}">
                        {{ __($data[$packageInfo->model_attribute()]) }}
                    </a>
                </li>
                @yield("form-breadcrumbs-post-show")
            @endif

            @if ("post" === $_method)
                @if ($routeCreate)
                    @yield("form-breadcrumbs-pre-create")
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ $routeCreate }}">
                            {{ __("Create") }}
                        </a>
                    </li>
                    @yield("form-breadcrumbs-post-create")
                @endif
            @elseif ("patch" === $_method)
                @if ($routeEdit)
                    @yield("form-breadcrumbs-pre-edit")
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ $routeEdit }}">
                            {{ __("Edit") }}
                        </a>
                    </li>
                    @yield("form-breadcrumbs-post-edit")
                @endif
            @endif
            @yield("form-breadcrumbs-last")
        </ol>
    </nav>
@endsection
