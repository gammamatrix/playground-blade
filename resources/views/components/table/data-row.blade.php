@foreach ($columns as $column => $columnMeta)
    <?php
    $value = '';
    $column = !empty($column) && is_string($column) ? $column : '';
    $routeParameterKey = !empty($routeParameterKey) && is_string($routeParameterKey) ? $routeParameterKey : '';
    $routeParameter = !empty($routeParameter) && is_string($routeParameter) ? $routeParameter : '';
    $record = !empty($record) && is_array($record) ? $record : [];

    $hasColumnError = false;

    /**
     * @var ?\Illuminate\Database\Eloquent\Model $datum
     */
    $datum = empty($datum) ? null : $datum;

    /**
     * @var string $accessor The accessor to use for data.
     */
    $accessor = isset($columnMeta['accessor']) && is_string($columnMeta['accessor']) ? $columnMeta['accessor'] : '';

    /**
     * @var string $property The property to use for data.
     */
    $property = isset($columnMeta['property']) && is_string($columnMeta['property']) ? $columnMeta['property'] : '';

    $columnMeta['class'] = isset($columnMeta['class']) ? $columnMeta['class'] : '';
    if (isset($columnMeta['classes']) && is_array($columnMeta['classes'])) {
        $columnMeta['class'] .= empty($columnMeta['class']) ? $columnMeta['class'] : ' ' . $columnMeta['class'];
    }
    $columnMeta['linkType'] = isset($columnMeta['linkType']) ? $columnMeta['linkType'] : '';
    $columnMeta['linkRoute'] = isset($columnMeta['linkRoute']) ? $columnMeta['linkRoute'] : '';

    $columnMeta['type'] = isset($columnMeta['type']) ? $columnMeta['type'] : '';
    $columnMeta['html'] = isset($columnMeta['html']) && is_bool($columnMeta['html']) ? $columnMeta['html'] : false;
    $columnMeta['action'] = isset($columnMeta['action']) ? $columnMeta['action'] : '';

    $columnMeta['showSpec'] = isset($columnMeta['showSpec']) && is_bool($columnMeta['showSpec']) ? $columnMeta['showSpec'] : false;

    $columnMeta['filter'] = isset($columnMeta['filter']) && is_string($columnMeta['filter']) && !empty($record[$column]) ? $columnMeta['filter'] : null;

    if ($columnMeta['filter']) {
        $columnMeta['filter_id'] = empty($record[$columnMeta['filter']]) ? '' : $record[$columnMeta['filter']];
        $columnMeta['filter_css_id'] = 'filter_' . $columnMeta['filter'] . '_' . $columnMeta['filter_id'];
        $columnMeta['filter_name'] = 'filter[' . $columnMeta['filter'] . '][]';
        $columnMeta['filter_checked'] = !empty($validated['filter']) && !empty($validated['filter'][$columnMeta['filter']]) && is_array($validated['filter'][$columnMeta['filter']]) && in_array($record[$columnMeta['filter']], $validated['filter'][$columnMeta['filter']]) ? 'checked' : '';
    }

    /**
     * @var string $link The link to use for the column's data.
     */
    $link = '';

    $preferLinkSlug = 'slug' === $columnMeta['linkType'];
    $preferLinkId = 'id' === $columnMeta['linkType'];
    $preferLinkGo = 'go' === $columnMeta['linkType'];
    $isUrlLink = 'url' === $columnMeta['linkType'];

    /**
     * @var string $isDate Is the column a datetime column?
     */
    $isDate = 'date' === $columnMeta['type'];

    /**
     * @var string $isFk Is the column a foreign key?
     */
    $isFk = 'fk' === $columnMeta['linkType'];
    // The foreign key needs a property to access.
    $isFk = $isFk && isset($columnMeta['property']) && !empty($columnMeta['property']);
    if ($preferLinkSlug) {
        if (!isset($record['slug']) || empty($record['slug'])) {
            // No slug available, use id for detail page instead.
            $columnMeta['linkType'] = $routeParameterKey;
            $preferSlug = false;
        }
    }
    // dd([
    //     '__METHOD__' => __METHOD__,
    //     '__FILE__' => __FILE__,
    //     '__LINE__' => __LINE__,
    //     '$value' => $value,
    //     '$column' => $column,
    //     '$columnMeta' => $columnMeta,
    //     // '$hasLink' => $hasLink,
    //     '$isFk' => $isFk,
    //     '$isUrlLink' => $isUrlLink,
    //     '$link' => $link,
    //     '$record' => $record,
    //     '$datum' => $datum,
    // ]);

    // Check for slug link first.
    if (empty($columnMeta['linkRoute'])) {
        $link = '';
    } elseif ($preferLinkSlug) {
        $link = empty($record['slug']) ? '' : route($columnMeta['linkRoute'], [$routeParameter => $record['slug']]);
    } elseif ($preferLinkId) {
        $link = empty($record[$routeParameterKey]) ? '' : route($columnMeta['linkRoute'], [$routeParameter => $record[$routeParameterKey]]);
    } elseif ($preferLinkGo) {
        $link = empty($record[$routeParameterKey]) ? '' : route($columnMeta['linkRoute'], ['go' => $record[$routeParameterKey]]);
    } elseif ($isFk) {
        $link = empty($record[$column]) ? '' : route($columnMeta['linkRoute'], [$routeParameter => $record[$column]]);
    }

    if ($isUrlLink) {
        $link = empty($record[$column]) ? '' : $record[$column];
        $value = $link;
    }
    $hasLink = !empty($link);
    // dump([
    //     '__METHOD__' => __METHOD__,
    //     '__FILE__' => __FILE__,
    //     '__LINE__' => __LINE__,
    //     '$value' => $value,
    //     '$column' => $column,
    //     '$columnMeta' => $columnMeta,
    //     '$hasLink' => $hasLink,
    //     '$isFk' => $isFk,
    //     '$isUrlLink' => $isUrlLink,
    //     '$link' => $link,
    //     '$record' => $record,
    //     '$datum' => $datum,
    // ]);

    if ($isFk && !empty($accessor)) {
        try {
            $fkModel = $datum && is_callable([$datum, $accessor]) ? $datum->{$accessor}()->first() : null;
            if ($fkModel) {
                $fkModelData = $fkModel->toArray();
                if (!empty($property) && isset($fkModelData[$property])) {
                    $value = $fkModelData[$property];
                }
            }
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::error($th);
            $fkModel = null;
            $value = null;
            $hasColumnError = true;
        }
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '__FILE__' => __FILE__,
        //     '__LINE__' => __LINE__,
        //     '$value' => $value,
        //     '$column' => $column,
        //     '$columnMeta' => $columnMeta,
        //     '$hasLink' => $hasLink,
        //     '$link' => $link,
        //     '$record' => $record,
        //     '$datum' => $datum,
        //     '$fkModel' => $fkModel ? $fkModel->toArray() : $fkModel,
        // ]);
    } elseif ($columnMeta['showSpec']) {
        // Get the label of the type.
        $accessor = empty($accessor) ? 'spec' : $accessor;
        $property = empty($property) ? 'label' : $property;
        $value = $datum->{$accessor}[$property];
    } else {
        // Set the value of the column.
        $value = $datum?->getAttributeValue($column);
    }

    if (is_array($value)) {
        if ('implode' === $columnMeta['action']) {
            $value = implode(', ', $value);
        } elseif ('json' === $columnMeta['action']) {
            $value = json_encode($value);
        } else {
            // Do nothing for now.
        }
    }

    $isFlag = isset($columnMeta['flag']) && is_bool($columnMeta['flag']) && $columnMeta['flag'];

    // dump([
    //     '__METHOD__' => __METHOD__,
    //     '__FILE__' => __FILE__,
    //     '__LINE__' => __LINE__,
    //     '$column' => $column,
    //     '$columnMeta' => $columnMeta,
    //     '$hasLink' => $hasLink,
    //     '$record' => $record,
    //     '$datum' => $datum,
    //     '$routeDelete' => $routeDelete,
    //     '$routeDeleteRelationship' => $routeDeleteRelationship,
    //     '$routeDeleteRelationshipId' => $routeDeleteRelationshipId,
    //     '$modelActions' => $modelActions,
    // ]);

    ?>
    <td
        class="{{ !empty($hasColumnError) ? 'text-danger ' : '' }}{{ !empty($columnMeta['hide-sm']) ? 'd-none d-sm-table-cell' : '' }}{{ $columnMeta['class'] }}">
        @if ($hasLink)
            <a href="{{ $link }}">
        @endif

        @if ($isFlag)
            <x-playground::model-flag :$columnMeta :$value />
        @elseif ($columnMeta['html'])
            {!! $value !!}
        @elseif ($isDate)
            <time datetime="{{ $value }}">{{ $value }}</time>
        @else
            {{ $value }}
        @endif

        @if ($hasLink)
            </a>
        @endif

        @if ($columnMeta['filter'])
            <div class="form-check">
                @php
                    $filter_table_id = request()->fullUrlWithoutQuery('filter.id');
                    if (!str_contains($filter_table_id, '?')) {
                        $filter_table_id .= '?';
                    } else {
                        $filter_table_id .= '&';
                    }
                @endphp
                <a href="{{ $filter_table_id . 'filter[id][]=' . $columnMeta['filter_id'] }}"
                    class="btn btn-outline-warning">
                    <span class="fas fa-filter"><span>
                </a>
            </div>
        @endif

    </td>
@endforeach
