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
