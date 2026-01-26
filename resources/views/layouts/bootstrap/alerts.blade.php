<div class="container-fluid alerts-container">
    <div class="row justify-content-center" id="alerts">
        <div class="col-md-12">
            @foreach (["command", "danger", "warning", "success", "info", "primary", "secondary", "tertiary", "quaternary", "light", "dark"] as $key)
                @if (Session::has($key))
                    <div
                        class="alert alert-{{ $key }} col mt-3 mb-3 alert-block alert-dismissible fade show"
                    >
                        @if ($key === "command")
                            <pre class="user-select-all">{!! Session::get($key) !!}</pre>
                        @else
                            <strong>{!! Session::get($key) !!}</strong>
                        @endif
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
