@if ($isFlag)
    <x-playground::model-flag :$columnMeta :$value />
@elseif ($withImage)
    <x-playground::model-image :$columnMeta :$fkModelData :$value />
@elseif ($columnMeta["html"])
    {!! $value !!}
@elseif ($isDate)
    <time datetime="{{ $value }}">{{ $value }}</time>
@else
    {{ $value }}
@endif
