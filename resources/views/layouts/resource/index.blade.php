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
$withPrivilege = \Playground\Auth\Facades\Can::withPrivilege($meta);

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

$packageInfo = $meta['info'] ?? null;
if (!($packageInfo instanceof \Playground\PackageInfo)) {
    throw new RuntimeException('Expecting package info for resources/views/layouts/resource/index.blade.php', 500);
}

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
                'linkRoute' => sprintf('%1$s.show', $packageInfo->model_route()),
                'label' => 'Label',
                'filter' => 'id',
            ],
            'slug' => [
                'hide-sm' => true,
                // 'linkType' => 'slug',
                'linkRoute' => sprintf('%1$s.slug', $packageInfo->model_route()),
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
                // 'linkRoute' => sprintf('%1$s.id', $packageInfo->model_route()),
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
        'id' => sprintf('%1$s-index', $packageInfo->model_slug()),
        'collapsible' => true,
        'sort' => $sort ?? [],
        'filters' => $filters ?? [],
        'validated' => $validated ?? [],
        'modelActions' => true,
        'routeParameter' => $packageInfo->model_slug(),
        'routeParameterKey' => 'id',
        'routeEdit' => sprintf('%1$s.edit', $packageInfo->model_route()),
        'routeDelete' => sprintf('%1$s.destroy', $packageInfo->model_route()),
        'routeRestore' => sprintf('%1$s.restore', $packageInfo->model_route()),
        'routeShow' => sprintf('%1$s.show', $packageInfo->model_route()),
        'routeUnlock' => sprintf('%1$s.unlock', $packageInfo->model_route()),
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
@section('title', sprintf('%1$s - %2$s Index', $packageInfo->module_label(), $packageInfo->model_label()))
@section('breadcrumbs')
    <nav aria-label="breadcrumb" class="container-fluid mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">
                    {{ __('Home') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route($packageInfo->module_route()) }}">
                    {{ __($packageInfo->module_label()) }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route($packageInfo->model_route()) }}">
                    {{ __(':model_label Index', ['model_label' => $packageInfo->model_label()]) }}
                </a>
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
                        aria-label="{{ $packageInfo->model_label() }} Controls and Actions">
                        <a class="btn btn-primary" href="{{ route(sprintf('%1$s.create', $packageInfo->model_route())) }}"
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
                :route-unlock="$tableComponent['routeUnlock']" :styling="$tableComponent['styling']">
                {{ $packageInfo->model_label_plural() }}
            </x-playground::table.data>

        </div>
    </div>
@endsection
