<th>
    <div class="text-nowrap" role="group" aria-label="{{ __('playground::pagination.row.actions.label') }}">
        @if ($withUnlock && !empty($record['locked']) && $routeUnlock)
            @include('playground::components/table/data-row-actions-unlock')
        @else
            @if ($withDelete && $routeDelete && empty($record['deleted_at']))
                @include('playground::components/table/data-row-actions-delete')
            @endif
            @include('playground::components/table/data-row-actions-edit')
        @endif
    </div>
</th>
