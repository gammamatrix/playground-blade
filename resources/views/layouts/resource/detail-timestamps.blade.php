<ul class="list-group list-group-flush">
    @if ($data->created_at)
    <li class="list-group-item">
        {{ __('Created') }}:
        <time datetime="{{ $data['created_at']->toW3cString() }}">{{ $data['created_at']->toDayDateTimeString() }}</time>
    </li>
    @endif
    @if ($data->updated_at)
    <li class="list-group-item">
        {{ __('Updated') }}:
        <time datetime="{{ $data['updated_at']->toW3cString() }}">{{ $data['updated_at']->toDayDateTimeString() }}</time>
    </li>
    @endif
    @if ($data->deleted_at)
    <li class="list-group-item">
        {{ __('Deleted') }}:
        <time datetime="{{ $data['deleted_at']->toW3cString() }}">{{ $data['deleted_at']->toDayDateTimeString() }}</time>
    </li>
    @endif
</ul>
