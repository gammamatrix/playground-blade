<th>
    <div class="text-nowrap" role="group" aria-label="{{ __('playground::pagination.row.actions.label') }}">

        @php
            if (false === $currentAccessToken) {
                $withDelete = !empty($routeDelete);
                $withEdit = !empty($routeEdit);
                $withRestore = !empty($routeRestore);
            } elseif(is_object($currentAccessToken)) {
                $withDelete = $routeDelete && ($currentAccessToken->can($privilege . ':delete') || $currentAccessToken->can($privilege . ':*'));
                $withEdit = $routeEdit && ($currentAccessToken->can($privilege . ':edit') || $currentAccessToken->can($privilege . ':*'));
                $withRestore = $routeRestore && ($currentAccessToken->can($privilege . ':restore') || $currentAccessToken->can($privilege . ':*'));
            }
        @endphp

        @if ($withDelete && $routeDeleteRelationship && $routeDelete)
            <form class="d-inline-block" method="POST"
                action="{{ route($routeDelete, ['product' => $routeDeleteRelationshipId, 'relationship' => $routeDeleteRelationship]) }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="_return_url" value="{{ $returnUrl }}">
                <input type="hidden" name="data[0][type]" value="{{ $routeDeleteRelationship }}">
                <input type="hidden" name="data[0][id]" value="{{ $record['id'] }}">
                <button type="submit" class="btn btn-danger ms-2" role="button">
                    <span class="fa-solid fa-xmark"></span>
                    <span class="d-none d-inline-sm">Delete</span>
                </button>
            </form>
        @elseif ($withDelete && $routeDelete)
            <form class="d-inline-block" method="POST"
                action="{{ route($routeDelete, [$routeParameter => $record[$routeParameterKey]]) }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="_return_url" value="{{ $returnUrl }}">
                <button type="submit" class="btn btn-danger ms-2" role="button">
                    <span class="fa-solid fa-xmark"></span>
                    <span class="d-none d-sm-inline">Delete</span>
                </button>
            </form>
        @endif

        @if (!empty($record['deleted_at']) && $routeRestore)
            <form class="d-inline-block" method="POST"
                action="{{ route($routeRestore, [$routeParameter => $record[$routeParameterKey]]) }}">
                @method('PUT')
                @csrf
                <input type="hidden" name="_return_url" value="{{ $returnUrl }}">
                <button type="submit" class="btn btn-primary" role="button">
                    <i class="fa-solid fa-recycle"></i>
                    <span class="d-none d-sm-inline">Restore</span>
                </button>
            </form>
        @elseif ($withEdit && $routeEdit)
            <a class="btn btn-primary"
                href="{{ route($routeEdit, [$routeParameter => $record[$routeParameterKey], '_return_url' => $returnUrl]) }}"
                role="button">
                <i class="fa-solid fa-pen"></i>
                <span class="d-none d-sm-inline">Edit</span>
            </a>
        @endif

    </div>
</th>
