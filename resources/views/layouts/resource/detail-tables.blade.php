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
