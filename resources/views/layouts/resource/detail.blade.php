<?php
/**
 * Resource Layout: detail
 *
 *
 * resources/views/layouts/resource/detail.blade.php
 *
 */

/**
 * @var array<string, mixed> $package_config
 */
$package_config = config('playground-blade');

/**
 * @var ?\Illuminate\Database\Eloquent\Model $data
 */
$data = empty($data) ? null : $data;

$meta = empty($meta) || !is_array($meta) ? [] : $meta;

/**
 * @var boolean $withParent
 */
$withParent = isset($withParent) && is_bool($withParent) ? $withParent : true;

$parent = $withParent && $data && is_callable([$data, 'parent']) ? $data->parent()->first() : null;

$withPrivilege = !empty($meta['info']) && !empty($meta['info']['privilege']) && is_string($meta['info']['privilege']) ? $meta['info']['privilege'] : 'playground';

$routeUnlock = !$data ? '' : route(sprintf('%1$s.unlock', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeDelete = !$data ? '' : route(sprintf('%1$s.destroy', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeEdit = !$data ? '' : route(sprintf('%1$s.edit', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);

$user = \Illuminate\Support\Facades\Auth::user();

$withCreate = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':create',
    'roles' => ['admin', 'manager'],
])->allowed();

$withDelete = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':delete',
    'roles' => ['admin', 'manager'],
])->allowed();

$withEdit = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':edit',
    'roles' => ['admin', 'manager'],
])->allowed();

$withUnlock = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':unlock',
    'roles' => ['admin', 'manager'],
])->allowed();

/**
 * @var boolean|string $withInfo
 */
$withInfo = isset($withInfo) && (is_bool($withInfo) || is_string($withInfo)) ? $withInfo : true;

/**
 * @var boolean $withInfo
 */
$withImage = isset($withImage) && is_bool($withImage) ? $withImage : true;

/**
 * @var boolean $hasTables
 */
$hasTables = !empty($dataDetail['tables']) && is_array($dataDetail['tables']);

?>
@extends($package_config['layout'])
@section('title', sprintf('%1$s - %2$s - %3$s', $data[$meta['info']['model_attribute']], $meta['info']['module_label'],
    $meta['info']['model_label']))
@section('breadcrumbs')
    <nav aria-label="breadcrumb" class="container-fluid mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route($meta['info']['module_route']) }}">{{ $meta['info']['module_label'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route($meta['info']['model_route']) }}">{{ $meta['info']['model_label'] }} Index</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route(sprintf('%1$s.show', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->id]) }}">{{ $data[$meta['info']['model_attribute']] }}</a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            @if ($withCreate)
                <div class="col-md-12 mb-3">
                    <div class="btn-group float-end px-3" role="group"
                        aria-label="{{ $meta['info']['model_label'] }} Controls and Actions">
                        <a class="btn btn-primary" href="{{ route(sprintf('%1$s.create', $meta['info']['model_route'])) }}"
                            role="button">Create</a>
                    </div>
                </div>
            @endif

            @yield('section-primary')

            @if ($withInfo)
                @if (is_string($withInfo))
                    <div class="col-md-12">
                        @include($withInfo)
                    </div>
                @else
                    @include('playground::layouts.resource.detail-information')
                @endif
            @endif

            @yield('section-secondary')

            @yield('section-children')

            @if ($hasTables)
                @foreach ($dataDetail['tables'] as $table)
                    <div class="row" id="{{ sprintf('section-%1$s-%2$s', $meta['info']['model_slug'], $table) }}">
                        @php
                            $hasTable = is_string($table) && !empty($dataDetail[$table]) && !empty($dataDetail[$table]['label']) && !empty($$table) && is_object($$table);
                        @endphp
                        @continue(!$hasTable)
                        @php
                            if (!empty($dataDetail[$table]['table']) && is_array($dataDetail[$table]['table'])) {
                                $components_table = $dataDetail[$table]['table'];
                                $components_table['paginator'] = $$table;
                            } else {
                                $components_table = [
                                    'columns' => [
                                        $meta['info']['model_attribute'] => [
                                            'label' => ucfirst($meta['info']['model_attribute']),
                                        ],
                                        'slug' => [
                                            // 'linkType' => 'slug',
                                            // 'linkRoute' => 'slug',
                                            'label' => 'Slug',
                                        ],
                                    ],
                                    'modelActions' => true,
                                    'routeEdit' => sprintf('%1$s.edit', $meta['info']['model_route']),
                                    'paginator' => $$table,
                                    'styling' => [
                                        'header' => [
                                            'class' => 'mt-3',
                                        ],
                                    ],
                                ];
                            }
                        @endphp
                        <div class="row">
                            <div class="col-md-12">
                                @component(sprintf('%1$scomponents/table', $package_config['view']), $components_table)
                                    {{ $dataDetail[$table]['label'] }}
                                @endcomponent
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif

            @yield('section-tables')

            @yield('section-tertiary')

        </div>
    </div>
@endsection
