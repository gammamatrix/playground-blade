<div class="accordion my-1" id="accordion-detail">
    <div class="accordion-item">
        <h1 class="accordion-header" id="accordion-header-0">
            <button
                class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#accordion-item-0"
                aria-expanded="true"
                aria-controls="accordion-item-0"
            >
                @if (! empty($modelLabel))
                    @if (! empty($accordionlLabel))
                        {{ __(":model_label :accordion_label: :model_attribute", ["model_label" => $modelLabel, "accordion_label" => $accordionlLabel, "model_attribute" => $data->getAttributeValue($packageInfo->model_attribute())]) }}
                    @else
                        {{ __(":model_label: :model_attribute", ["model_label" => $modelLabel, "model_attribute" => $data->getAttributeValue($packageInfo->model_attribute())]) }}
                    @endif
                @endif
            </button>
        </h1>
        <div
            id="accordion-item-0"
            class="accordion-collapse collapse show"
            aria-labelledby="accordion-header-0"
            data-bs-parent="#accordion-detail"
        >
            <div class="accordion-body">
                <div class="d-flex justify-content-end">
                    @include("playground::layouts.resource.detail-actions", ["css" => "mb-3"])
                </div>
                @yield("detail-accordion-body-header")
                @yield("detail-accordion-body")
                @includeWhen($withInfo, "playground::layouts.resource.detail-info")

                @if ($withAccordionFlags)
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="">
                            @yield("detail-information-flags")
                        </div>
                    </div>
                @endif

                @if ($withAccordionTimestamps)
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card">
                            @include("playground::layouts.resource.detail-timestamps")
                        </div>
                    </div>
                @endif

                @yield("detail-accordion-body-footer")
            </div>
        </div>
    </div>
</div>
