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

$_return_url = old('_return_url');

$routeModule = route($meta['info']['module_route']);
$routeModel = route($meta['info']['model_route']);
$routeShow = !$data ? '' : route(sprintf('%1$s.show', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeLock = !$data ? '' : route(sprintf('%1$s.lock', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeUnlock = !$data ? '' : route(sprintf('%1$s.unlock', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeDelete = !$data ? '' : route(sprintf('%1$s.destroy', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id'), '_return_url' => $_return_url ?: $routeShow]);
$routeRestore = !$data ? '' : route(sprintf('%1$s.restore', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
$routeEdit = !$data ? '' : route(sprintf('%1$s.edit', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id'), '_return_url' => $_return_url ?: $routeShow]);

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

$withLock = \Playground\Auth\Facades\Can::access($user, [
    'allow' => false,
    'any' => true,
    'privilege' => $withPrivilege . ':lock',
    'roles' => ['admin', 'manager'],
])->allowed();

/**
 * @var boolean|string $withAccordion
 */
$withAccordion = isset($withAccordion) && (is_bool($withAccordion) || is_string($withAccordion)) ? $withAccordion : false;

/**
 * @var boolean|string $withAccordionFlags
 */
$withAccordionFlags = isset($withAccordionFlags) && (is_bool($withAccordionFlags) || is_string($withAccordionFlags)) ? $withAccordionFlags : true;

/**
 * @var boolean|string $withAccordionTimestamps
 */
$withAccordionTimestamps = isset($withAccordionTimestamps) && (is_bool($withAccordionTimestamps) || is_string($withAccordionTimestamps)) ? $withAccordionTimestamps : true;

/**
 * @var boolean|string $withCard
 */
$withCard = isset($withCard) && (is_bool($withCard) || is_string($withCard)) ? $withCard : true;

/**
 * @var boolean|string $withCardHeader
 */
$withCardHeader = isset($withCardHeader) && (is_bool($withCardHeader) || is_string($withCardHeader)) ? $withCardHeader : true;

/**
 * @var boolean|string $withCardBody
 */
$withCardBody = isset($withCardBody) && (is_bool($withCardBody) || is_string($withCardBody)) ? $withCardBody : true;

/**
 * @var boolean|string $withCardFlags
 */
$withCardFlags = isset($withCardFlags) && (is_bool($withCardFlags) || is_string($withCardFlags)) ? $withCardFlags : true;

/**
 * @var boolean|string $withCardTimestamps
 */
$withCardTimestamps = isset($withCardTimestamps) && (is_bool($withCardTimestamps) || is_string($withCardTimestamps)) ? $withCardTimestamps : true;

/**
 * @var boolean|string $withInfo
 */
$withInfo = isset($withInfo) && (is_bool($withInfo) || is_string($withInfo)) ? $withInfo : true;

/**
 * @var boolean $withImage
 */
$withImage = isset($withImage) && is_bool($withImage) ? $withImage : true;

/**
 * @var boolean $withTables
 */
$withTables = isset($withTables) && is_bool($withTables) ? $withTables : true;

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
            <li class="breadcrumb-item">
                <a href="/">{{ __('Home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ $routeModule }}">
                    {{ __($meta['info']['module_label']) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ $routeModel }}">
                    {{ __(':module_label Index', ['module_label' => $meta['info']['model_label']]) }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ $routeShow }}">
                    {{ __($data[$meta['info']['model_attribute']]) }}
                </a>
            </li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">

        @yield('section-header')

        @includeWhen($withCard, 'playground::layouts.resource.detail-card')

        @includeWhen($withAccordion, 'playground::layouts.resource.detail-accordion')

        @yield('section-primary')

        @yield('section-secondary')

        @yield('section-children')

        @includeWhen($withTables, 'playground::layouts.resource.detail-tables')

        @yield('section-tables')

        @yield('section-tertiary')

        @yield('section-footer')

    </div>
@endsection

@push('body')
    <script type="application/javascript">
window.onload = function() {
    'use strict';
    if (typeof playground === 'object') {
        playground.forms.validation();
    }
}
</script>
@endpush
