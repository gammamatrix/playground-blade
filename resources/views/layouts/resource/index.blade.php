<?php
/**
 * Resource Layout: index
 *
 *
 * resources/views/layouts/resource/index.blade.php
 *
 */

$package_config = config('playground-blade');

$meta = empty($meta) || !is_array($meta) ? [] : $meta;

$withPrivilege = !empty($meta['info']) && !empty($meta['info']['privilege']) && is_string($meta['info']['privilege']) ? $meta['info']['privilege'] : 'playground';

$user = \Illuminate\Support\Facades\Auth::user();

$withCreate = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':create',
    'roles' => ['admin', 'manager'],
])->allowed();

/**
 * @var boolean $withTable
 */
$withTable = isset($withTable) && is_bool($withTable) ? $withTable : true;

/**
 * @var boolean|string $withTable
 */
$withTable = isset($withTable) && (is_bool($withTable) || is_string($withTable)) ? $withTable : true;

/**
 * @var array<string, array<string, mixed>> $withTableColumns
 */
$withTableColumns = isset($withTableColumns) && is_array($withTableColumns) && !empty($withTableColumns) ? $withTableColumns : [];

$tableComponent = [];

if ($withTable) {
    if (empty($withTableColumns)) {
        $withTableColumns = [
            'label' => [
                'linkType' => 'id',
                'linkRoute' => sprintf('%1$s.show', $meta['info']['model_route']),
                'label' => 'Label',
                'filter' => 'id',
            ],
            'slug' => [
                'hide-sm' => true,
                // 'linkType' => 'slug',
                'linkRoute' => sprintf('%1$s.slug', $meta['info']['model_route']),
                'label' => 'Slug',
            ],
            'active' => [
                'hide-sm' => true,
                'flag' => true,
                'label' => 'Active',
                'onTrueClass' => 'fas fa-check text-success',
            ],
            'locked' => [
                'hide-sm' => true,
                'flag' => true,
                'label' => 'Locked',
                'onTrueClass' => 'fas fa-lock text-success',
            ],
            'flagged' => [
                'hide-sm' => true,
                'flag' => true,
                'label' => 'Flagged',
                'onTrueClass' => 'fas fa-flag text-warning',
            ],
            'parent_id' => [
                'hide-sm' => true,
                // 'linkType' => 'fk',
                // 'accessor' => 'parent',
                'property' => 'label',
                // 'linkRoute' => sprintf('%1$s.id', $meta['info']['model_route']),
                'label' => 'Parent',
                'filter' => 'parent_id',
            ],
            'description' => [
                'hide-sm' => true,
                'label' => 'Description',
                'html' => true,
            ],
        ];
    }
    $tableComponent = [
        'trashable' => true,
        'columns' => $withTableColumns,
        'id' => sprintf('%1$s-index', $meta['info']['model_slug']),
        'collapsible' => true,
        'sort' => $sort ?? [],
        'filters' => $filters ?? [],
        'validated' => $validated ?? [],
        'modelActions' => true,
        'routeParameter' => $meta['info']['model_slug'],
        'routeParameterKey' => 'id',
        'routeEdit' => sprintf('%1$s.edit', $meta['info']['model_route']),
        'routeDelete' => sprintf('%1$s.destroy', $meta['info']['model_route']),
        'routeRestore' => sprintf('%1$s.restore', $meta['info']['model_route']),
        'paginator' => $paginator ?? null,
        'privilege' => $withPrivilege,
        'styling' => [
            'header' => [
                'class' => 'mt-3',
            ],
        ],
    ];
}
?>
@extends($package_config['layout'])
@section('title', sprintf('%1$s - %2$s Index', $meta['info']['module_label'], $meta['info']['model_label']))
@section('breadcrumbs')
    <nav aria-label="breadcrumb" class="container-fluid mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route($meta['info']['module_route']) }}">{{ $meta['info']['module_label'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route($meta['info']['model_route']) }}">{{ $meta['info']['model_label'] }} Index</a></li>
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

            @if ($withTable && is_string($withTable))
                @include($withTable)
            @elseif ($withTable)
                <div class="col-md-12">
                </div>
            @endif

            @yield('section-secondary')

            <x-playground::table.data :columns="$withTableColumns" :paginator="$paginator" :model-actions="true" :trashable="true"
                :id="$tableComponent['id']" :meta="$meta" :validated="$meta['validated']" :sort="$meta['sortable']" :privilege="$tableComponent['privilege']" :collapsible="true"
                :route-parameter="$tableComponent['routeParameter']" :route-parameter-key="$tableComponent['routeParameterKey']" :route-edit="$tableComponent['routeEdit']" :route-delete="$tableComponent['routeDelete']" :route-restore="$tableComponent['routeRestore']"
                :styling="$tableComponent['styling']">
                {{ $meta['info']['model_label_plural'] }}
            </x-playground::table.data>

        </div>
    </div>
@endsection
