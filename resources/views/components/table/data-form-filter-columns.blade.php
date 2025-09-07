<?php
$columns = [
    'all' => [
        'label' => 'All',
    ],
    'standard' => [
        'label' => 'Standard',
    ],
    'mobile' => [
        'label' => 'Mobile',
    ],
];

$viewableColumns = 'standard';
if (!empty($validated)
    && !empty($validated['columns'])
    && is_string($validated['columns'])
    && in_array($validated['columns'], array_keys($columns))
) {
    $viewableColumns = $validated['columns'];
}
// dd([
//     '$viewableColumns' => $viewableColumns,
//     '$validated' => $validated,
//     '$columns' => $columns,
//     '$meta' => $meta,
// ])
?>
<fieldset class="mb-3" id="{{ $id }}-fieldset-filter-columns">
    <legend>
        Filter Columns
    </legend>

    <div class="container collapse show">
        <div class="row">

            <div class="col">
                <div class="input-group mb-3">

                    @foreach($columns as $column => $columnMeta)
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="columns" id="filter_columns_{{$column}}"
                                   {{ $column === $viewableColumns ? 'checked' : '' }} value="{{$column}}">
                            <label class="form-check-label" for="filter_columns_{{$column}}">
                                {{$columnMeta['label'] ?? 'view' }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</fieldset>
