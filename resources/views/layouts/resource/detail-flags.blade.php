@if(!empty($data) && $data->deleted_at)
<span class="badge text-bg-danger">
    <i class="fas fa-trash"></i>
    {{ __('Trashed') }}
</span>
@endif

@if(!empty($flags) && is_array($flags))
@foreach ($flags as $flagKey => $flagMeta)
@if ($data->getAttribute($flagKey))
<span class="badge {{$flagMeta['badge'] ?? 'text-bg-secondary'}}">
    <i class="{{$flagMeta['icon'] ?? ''}}"></i>
    {{ __($flagMeta['label']) }}
</span>
@endif
@endforeach
@endif
