@if(empty($fkModelData))
{{$value}}
@else
@php

$withInitials = !empty($columnMeta['with-initials']) && is_bool($columnMeta['with-initials']);
$withName = !empty($columnMeta['with-name']) && is_bool($columnMeta['with-name']);

$hasAvatar = !empty($fkModelData['avatar']) && is_string($fkModelData['avatar']);
$hasImage = !empty($fkModelData['image']) && is_string($fkModelData['image']);

$property = !empty($columnMeta['property']) && is_string($columnMeta['property']) ? $columnMeta['property'] : '';

$width = 36;
$image = '';
$initials = '';
$name = !empty($fkModelData[$property]) && is_string($fkModelData[$property]) ? $fkModelData[$property] : '';
if ($name) {
    $initials = preg_filter('/[^A-Z]/', '', $name);
    if (mb_strlen($initials) > 2) {
        $initials = mb_substr($initials, 0, 1).mb_substr($initials, -1);
    }
}

if ($hasAvatar) {
    $image = $fkModelData['avatar'];
} elseif ($hasImage) {
    $image = $fkModelData['image'];
}

@endphp
@if($image)
<img src="{{$image}}" class="rounded-circle" alt="Avatar" width="{{$width}}" height="{{$width}}">
@elseif($initials)
<span class="rounded-circle" width="{{$width}}">
    {{$initials}}
</span>
@endif

@if($withName && $name)
<span data-model-id="{{$value}}">{{$name}}</span>
@endif

@endif
