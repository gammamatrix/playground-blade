<?php
/**
 * Resource Layout: form
 *
 *
 * resources/views/layouts/resource/form.blade.php
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
 * @var boolean $withBodyScript
 */
$withBodyScript = isset($withBodyScript) && is_bool($withBodyScript) ? $withBodyScript : true;

/**
 * @var boolean|string $withFormInfo
 */
$withFormInfo = isset($withFormInfo) && (is_bool($withFormInfo) || is_string($withFormInfo)) ? $withFormInfo : true;

/**
 * @var boolean $withFormLabel
 */
$withFormLabel = isset($withFormLabel) && is_bool($withFormLabel) ? $withFormLabel : true;

/**
 * @var boolean $withFormLabelRequired
 */
$withFormLabelRequired = $withFormLabel && !empty($withFormLabelRequired);

/**
 * @var boolean $withFormTitle
 */
$withFormTitle = isset($withFormTitle) && is_bool($withFormTitle) ? $withFormTitle : true;

/**
 * @var boolean $withFormTitleRequired
 */
$withFormTitleRequired = $withFormTitle && !empty($withFormTitleRequired);

/**
 * @var boolean $withFormSlug
 */
$withFormSlug = isset($withFormSlug) && is_bool($withFormSlug) ? $withFormSlug : true;

/**
 * @var boolean $withFormParent
 */
$withFormParent = isset($withFormParent) && is_bool($withFormParent) ? $withFormParent : true;

/**
 * @var boolean|string $withFormButtons
 */
$withFormButtons = isset($withFormButtons) && (is_bool($withFormButtons) || is_string($withFormButtons)) ? $withFormButtons : true;

/**
 * @var boolean|string $withFormLifecycle
 */
$withFormLifecycle = isset($withFormLifecycle) && (is_bool($withFormLifecycle) || is_string($withFormLifecycle)) ? $withFormLifecycle : true;

 /**
 * @var boolean|string $withFormStatus
 */
$withFormStatus = isset($withFormStatus) && (is_bool($withFormStatus) || is_string($withFormStatus)) ? $withFormStatus : true;

/**
 * @var boolean|string $withFormFlags
 */
$withFormFlags = isset($withFormFlags) && (is_bool($withFormFlags) || is_string($withFormFlags)) ? $withFormFlags : true;

/**
 * @var boolean|string $withFormMatrix
 */
$withFormMatrix = isset($withFormMatrix) && (is_bool($withFormMatrix) || is_string($withFormMatrix)) ? $withFormMatrix : true;

/**
 * @var boolean|string $withFormPermissions
 */
$withFormPermissions = isset($withFormPermissions) && (is_bool($withFormPermissions) || is_string($withFormPermissions)) ? $withFormPermissions : true;

/**
 * @var boolean|string $withFormPublishing
 */
$withFormPublishing = isset($withFormPublishing) && (is_bool($withFormPublishing) || is_string($withFormPublishing)) ? $withFormPublishing : true;

/**
 * @var boolean|string $withFormPlanning
 */
$withFormPlanning = isset($withFormPlanning) && (is_bool($withFormPlanning) || is_string($withFormPlanning)) ? $withFormPlanning : true;

 /**
 * @var boolean|string $withFormStatus
 */
$withFormStatus = isset($withFormStatus) && (is_bool($withFormStatus) || is_string($withFormStatus)) ? $withFormStatus : true;

/**
 * @var boolean $withFormContent
 */
$withFormContent = isset($withFormContent) && is_bool($withFormContent) ? $withFormContent : true;

/**
 * @var boolean $withFormDescription
 */
$withFormDescription = isset($withFormDescription) && is_bool($withFormDescription) ? $withFormDescription : true;

/**
 * @var boolean $withFormIntroduction
 */
$withFormIntroduction = isset($withFormIntroduction) && is_bool($withFormIntroduction) ? $withFormIntroduction : true;

/**
 * @var boolean $withFormSummary
 */
$withFormSummary = isset($withFormSummary) && is_bool($withFormSummary) ? $withFormSummary : true;

/**
 * @var boolean $hasMetaInfo
 */
$hasMetaInfo = !empty($meta['info']) && is_array($meta['info']) && !empty($meta['info']['model_attribute']) && is_string($meta['info']['model_attribute']);

if (empty($hasMetaInfo) && !empty($data)) {
    throw new RuntimeException('Expecting meta and data info for resources/views/layouts/resource/form.blade.php', 500);
}

/**
 * @var string $model_attribute
 */
$model_attribute = $hasMetaInfo && $data && is_string($data->getAttributeValue($meta['info']['model_attribute'])) ? $data->getAttributeValue($meta['info']['model_attribute']) : '';

$_return_url = old('_return_url');

$routeModule = route($meta['info']['module_route']);
$routeModel = route($meta['info']['model_route']);

$routeShow = '';
$routeCreate = route(sprintf('%1$s.create', $meta['info']['model_route']), ['_return_url' => $_return_url]);
$routeEdit = '';

$formTitle = '';
$_methodUrl = '';
$_method = empty($_method) ? '' : $_method;
if ('patch' === $_method) {
    $formTitle = sprintf('Editing: %1$s', $model_attribute);
    $_methodUrl = route(sprintf('%1$s.patch', $meta['info']['model_route']), $data?->getAttributeValue('id'));
    $routeShow = route(sprintf('%1$s.show', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id')]);
    $routeEdit = route(sprintf('%1$s.edit', $meta['info']['model_route']), [$meta['info']['model_slug'] => $data->getAttributeValue('id'), '_return_url' => $_return_url ?: $routeShow]);
} elseif ('post' === $_method) {
    $formTitle = sprintf('Create a %1$s', $meta['info']['model_label']);
    $_methodUrl = route(sprintf('%1$s.post', $meta['info']['model_route']));
}

?>
@extends($package_config['layout'], [
    'withEditor' => true,
])
@section('title', sprintf('%1$s - %2$s Form', $meta['info']['module_label'], $meta['info']['model_label']))
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
            @if ($routeShow)
                <li class="breadcrumb-item">
                    <a href="{{ $routeShow }}">
                        {{ __($data[$meta['info']['model_attribute']]) }}
                    </a>
                </li>
            @endif
            @if ('post' === $_method)
                @if ($routeCreate)
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ $routeCreate }}">
                            {{ __('Create') }}
                        </a>
                    </li>
                @endif
            @elseif ('patch' === $_method)
                @if ($routeEdit)
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ $routeEdit }}">
                            {{ __('Edit') }}
                        </a>
                    </li>
                @endif
            @endif
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <form method="POST" action="{{ $_methodUrl }}" class="needs-validation" novalidate>

                    @method($_method)

                    @csrf

                    <input type="hidden" name="_return_url" value="{{ $_return_url }}">

                    @if ('patch' === $_method)
                        <input type="hidden" name="id" value="{{ old('id') }}">
                    @endif

                    @yield('form-primary')

                    @if ($withFormInfo)
                        @if (is_string($withFormInfo))
                            @include($withFormInfo)
                        @else
                            @include('playground::layouts.resource.form-info')
                        @endif
                    @endif

                    @yield('form-secondary')

                    @if ($withFormLifecycle)
                        @if (is_string($withFormLifecycle))
                            @include($withFormLifecycle)
                        @else
                            @include('playground::layouts.resource.form-lifecycle')
                        @endif
                    @endif

                    @if ($withFormStatus)
                        @if (is_string($withFormStatus))
                            @include($withFormStatus)
                        @else
                            @include('playground::layouts.resource.form-status')
                        @endif
                    @endif

                    @if ($withFormFlags)
                        @if (is_string($withFormFlags))
                            @include($withFormFlags)
                        @else
                            @include('playground::layouts.resource.form-flags')
                        @endif
                    @endif

                    @if ($withFormMatrix)
                        @if (is_string($withFormMatrix))
                            @include($withFormMatrix)
                        @else
                            @include('playground::layouts.resource.form-matrix')
                        @endif
                    @endif

                    @if ($withFormPermissions)
                        @if (is_string($withFormPermissions))
                            @include($withFormPermissions)
                        @else
                            @include('playground::layouts.resource.form-permissions')
                        @endif
                    @endif

                    @if ($withFormPlanning)
                        @if (is_string($withFormPlanning))
                            @include($withFormPlanning)
                        @else
                            @include('playground::layouts.resource.form-planning')
                        @endif
                    @endif

                    @if ($withFormPublishing)
                        @if (is_string($withFormPublishing))
                            @include($withFormPublishing)
                        @else
                            @include('playground::layouts.resource.form-publishing')
                        @endif
                    @endif

                    @yield('form-tertiary')

                    @if ($withFormContent || $withFormDescription || $withFormContent)
                        @include('playground::layouts.resource.form-content')
                    @endif

                    @yield('form-quaternary')

                    @if ($withFormButtons)
                        @if (is_string($withFormButtons))
                            @include($withFormButtons)
                        @else
                            <fieldset class="mb-3">
                                <div class="button-group float-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        {{ __('Reset') }}
                                    </button>
                                    <a class="btn btn-danger" href="{{ $_return_url }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </fieldset>
                        @endif
                    @endif

                    @yield('form-quinary')

                </form>

            </div>

        </div>
    </div>
@endsection

@if ($withBodyScript)

@push('body')
    <script type="application/javascript">
window.onload = function() {
    'use strict';
@if ($withFormSummary)
    if (typeof playground === 'object') {
        playground.forms.editor('#form-input-summary');
    }
@endif
@if ($withFormContent)
    if (typeof playground === 'object') {
        playground.forms.editor('#form-input-content');
    }
@endif
    if (typeof playground === 'object') {
        playground.forms.validation();
    }
}
</script>
@endpush

@endif
