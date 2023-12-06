<?php
$hasFlagOnFalseClass = !empty($columnMeta['onFalseClass']) && is_string($columnMeta['onFalseClass']);

$hasFlagOnFalseLabel = !empty($columnMeta['onFalseLabel']) && is_string($columnMeta['onFalseLabel']);

$hasFlagOnTrueClass = !empty($columnMeta['onTrueClass']) && is_string($columnMeta['onTrueClass']);

$hasFlagOnTrueLabel = !empty($columnMeta['onTrueLabel']) && is_string($columnMeta['onTrueLabel']);

$hasFlagOnFalse = $hasFlagOnFalseClass || $hasFlagOnFalseLabel;
$hasFlagOnTrue = $hasFlagOnTrueClass || $hasFlagOnTrueLabel;

if (!($hasFlagOnFalse || $hasFlagOnTrue)) {
    return;
}
?>
@if ($value)
    @if ($hasFlagOnTrueClass)
        <span class="{{ $columnMeta['onTrueClass'] }}"></span>
    @endif
    @if ($hasFlagOnTrueLabel)
        {{ $columnMeta['onTrueLabel'] }}
    @endif
@else
    @if ($hasFlagOnFalseClass)
        <span class="{{ $columnMeta['onFalseClass'] }}"></span>
    @endif
    @if ($hasFlagOnFalseLabel)
        {{ $columnMeta['onFalseLabel'] }}
    @endif
@endif
