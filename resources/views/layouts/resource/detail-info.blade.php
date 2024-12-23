<table class="table">
    <tbody>
        @yield('detail-info-table-header')
        <tbody>
        <tr>
            <th scope="row">{{ __('Slug') }}</th>
            <td>{{ $data->slug }}</td>
        </tr>
        @yield('detail-info-table-body')
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
        </tbody>
        @yield('detail-info-table-header')
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
