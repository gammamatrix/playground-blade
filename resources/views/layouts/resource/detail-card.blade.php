<div class="card my-1">
    @if ($withCardHeader)
        <div class="card-header">
            @include("playground::layouts.resource.detail-actions")
            <h1>
                {{ __($data->getAttributeValue($packageInfo->model_attribute())) }}
            </h1>
        </div>
    @endif

    @if ($withImage && $data && $data->image)
        <div class="card-header">
            <img
                class="card-img-top"
                src="{{ $data->image }}"
                alt="{{ __(":model_label Image", ["model_label" => $packageInfo->model_label()]) }}"
            />
        </div>
    @endif

    @if ($withCardBody)
        <div class="card-body">
            @yield("detail-card-body-header")
            @yield("detail-card-body")
            @includeWhen($withInfo, "playground::layouts.resource.detail-info")
            @yield("detail-card-body-footer")
        </div>
    @endif

    @if ($withCardFlags)
        <div class="card-footer">
            @yield("detail-information-flags")
        </div>
    @endif

    @if ($withCardTimestamps)
        <div class="card-footer">
            @include("playground::layouts.resource.detail-timestamps")
        </div>
    @endif
</div>
