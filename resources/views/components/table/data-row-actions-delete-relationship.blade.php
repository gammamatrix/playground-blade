<form class="d-inline-block" method="POST"
    action="{{ route($routeDelete, [$routeDeleteRelationship => $routeDeleteRelationshipId, 'relationship' => $routeDeleteRelationship]) }}">
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
