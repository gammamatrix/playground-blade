<form class="d-inline-block" method="POST"
    action="{{ route($routeUnlock, [$routeParameter => $record[$routeParameterKey]]) }}">
    @method('DELETE')
    @csrf
    <input type="hidden" name="_return_url" value="{{ $returnUrl }}">
    <button type="submit" class="btn btn-danger ms-2" role="button">
        <span class="fas fa-unlock text-success"></span>
        <span class="d-none d-sm-inline">Unlock</span>
    </button>
</form>
