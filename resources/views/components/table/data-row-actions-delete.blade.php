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
