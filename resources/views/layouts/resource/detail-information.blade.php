<div class="card my-1">
    <div class="card-header">
        @if ($withDelete || $withEdit)
            <div class="btn-group float-end" role="group"
                aria-label="{{ $meta['info']['model_label'] }} Controls and Actions">
                <button id="brand-actions" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="fas fa-gear"></span> {{ __('Actions') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="brand-actions">
                    <form method="POST" action="{{ $routeDelete }}" novalidate>
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" role="button">
                            {{ __('Trash') }}
                            <span class="fas fa-trash float-end"></span>
                        </button>
                    </form>
                    <a class="dropdown-item" href="{{ $routeEdit }}" role="button">
                        {{ __('Edit') }} <span class="fas fa-edit float-end"></span>
                    </a>
            </div>
    </div>
    @endif
    <h1>{{ $data->label }}</h1>
</div>
@if ($withImage && $data && $data->image)
    <div class="card-header">
        <img class="card-img-top" src="{{ $data->image }}" alt="{{ $meta['info']['model_label'] }} Image">
    </div>
@endif
<div class="card-body">

    <h2>{{ __('Information') }}</h2>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">{{ __('Slug') }}</th>
                <td>{{ $data->slug }}</td>
            </tr>
            @if ($parent)
                <tr>
                    <th scope="row">{{ __('Parent ' . $meta['info']['model_label']) }}</th>
                    <td>
                        <a
                            href="{{ route(sprintf('%1$s.show', $meta['info']['model_route']), [$meta['info']['model_slug'] => $parent->id]) }}">
                            {{ $parent->label }}
                        </a>
                    </td>
                </tr>
            @endif
            <tr>
                <th scope="row">{{ __('Created') }}</th>
                <td>
                    @if ($data->created_at)
                        <time datetime="{{ $data['created_at'] }}">{{ $data['created_at'] }}</time>
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">{{ __('Updated') }}</th>
                <td>
                    @if ($data->updated_at)
                        <time datetime="{{ $data['updated_at'] }}">{{ $data['updated_at'] }}</time>
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">{{ __('Active') }}</th>
                <td>
                    @if ($data->active)
                        <span class="fas fa-check"></span>
                    @endif
                </td>
            </tr>
            @yield('detail-information-table')
        </tbody>
    </table>

    @if ($data->description)
        <h4>{{ __('Description') }}</h4>

        <div class="description">{{ $data->description }}</div>
    @endif

    @if ($data->introduction)
        <h4>{{ __('Introduction') }}</h4>

        <div class="introduction">{{ $data->introduction }}</div>
    @endif

    @if ($data->content)
        <h4>{{ __('Content') }}</h4>

        <div class="content">{!! $data->content !!}</div>
    @endif

    @if ($data->summary)
        <h4>{{ __('Summary') }}</h4>

        <div class="summary">{!! $data->summary !!}</div>
    @endif

</div>
</div>
