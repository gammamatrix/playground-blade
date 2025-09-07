@foreach ($columns as $column => $columnMeta)
        <?php
        if (empty($columnMeta) || !is_array($columnMeta)) {
            $columnMeta = [];
        }
        $value = '';
        $column = !empty($column) && is_string($column) ? $column : '';
        $routeParameterKey = !empty($routeParameterKey) && is_string($routeParameterKey) ? $routeParameterKey : '';
        $routeParameter = !empty($routeParameter) && is_string($routeParameter) ? $routeParameter : '';
        $record = !empty($record) && is_array($record) ? $record : [];

        $fkModelData = [];

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

        $columnMeta['class'] = isset($columnMeta['class']) && is_string($columnMeta['class']) ? $columnMeta['class'] : '';
        if (isset($columnMeta['classes']) && is_array($columnMeta['classes'])) {
            $columnMeta['class'] .= empty($columnMeta['class']) ? $columnMeta['class'] : ' ' . $columnMeta['class'];
        }
        $columnMeta['linkType'] = isset($columnMeta['linkType']) && is_string($columnMeta['linkType']) ? $columnMeta['linkType'] : '';
        $columnMeta['linkRoute'] = isset($columnMeta['linkRoute']) && is_string($columnMeta['linkRoute']) ? $columnMeta['linkRoute'] : '';

        $columnMeta['type'] = isset($columnMeta['type']) && is_string($columnMeta['type']) ? $columnMeta['type'] : '';
        $columnMeta['html'] = isset($columnMeta['html']) && is_bool($columnMeta['html']) && $columnMeta['html'];
        $columnMeta['action'] = isset($columnMeta['action']) && is_string($columnMeta['action']) ? $columnMeta['action'] : '';

        $columnMeta['filter'] = isset($columnMeta['filter']) && is_string($columnMeta['filter']) && !empty($record[$column]) ? $columnMeta['filter'] : null;

        if ($columnMeta['filter']) {
            $columnMeta['filter_id'] = empty($record[$columnMeta['filter']]) || !is_string($record[$columnMeta['filter']]) ? '' : $record[$columnMeta['filter']];
            $columnMeta['filter_css_id'] = 'filter_' . $columnMeta['filter'] . '_' . $columnMeta['filter_id'];
            $columnMeta['filter_name'] = 'filter[' . $columnMeta['filter'] . '][]';
            $columnMeta['filter_checked'] = !empty($validated) && is_array($validated) && !empty($validated['filter']) && is_array($validated['filter'])
            && !empty($validated['filter'][$columnMeta['filter']])
            && is_array($validated['filter'][$columnMeta['filter']])
            && in_array(
                $record[$columnMeta['filter']],
                $validated['filter'][$columnMeta['filter']]
            ) ? 'checked' : '';
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
         * @var bool $isDate Is the column a datetime column?
         */
        $isDate = 'date' === $columnMeta['type'];

        /**
         * @var bool $isFk Is the column a foreign key?
         */
        $isFk = in_array($columnMeta['linkType'], ['fk', 'filter-id']);
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
        //     // '$datum' => $datum,
        //     '$routeParameter' => $routeParameter,
        //     '$routeParameterKey' => $routeParameterKey,
        //     '$record[$routeParameterKey]' => $record[$routeParameterKey] ?? 'nope',
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
            if (!empty($record[$column]) && !empty($columnMeta['routeParameter']) && !empty($columnMeta['routeParameterKey'])) {
                $link = route($columnMeta['linkRoute'], [
                    $columnMeta['routeParameter'] => $record[$columnMeta['routeParameterKey']],
                ]);
            }
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
        //     // '$record' => $record,
        //     // '$datum' => $datum,
        // ]);

        if ($isFk && !empty($accessor)) {
            try {
                /**
                 * @var ?\Illuminate\Database\Eloquent\Model $fkModel
                 */
                $fkModel = null;
                if ($datum && is_callable([$datum, $accessor])) {
                    $fkModel = $datum->{$accessor}();
                    $fkModel = $fkModel instanceof \Illuminate\Database\Eloquent\Relations\Relation ? $fkModel->first() : null;
                }
                if ($fkModel) {
                    $fkModelData = $fkModel->toArray();
                    if (!empty($property)) {
                        if ($property === 'label_or_title') {
                            $value = $fkModel->getAttribute('label_or_title');
                        } elseif (isset($fkModelData[$property])) {
                            $value = $fkModelData[$property];
                        }
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
        $withImage = isset($columnMeta['with-image']) && is_bool($columnMeta['with-image']) && $columnMeta['with-image'];

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
                    <x-playground::model-flag :$columnMeta :$value/>
                @elseif ($withImage)
                    <x-playground::model-image :$columnMeta :$fkModelData :$value/>
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
