<div class="{{ $containerClass }}" {!! $attributes !!}>

    <div class="snippet">
        @if ($withTitle && is_array($snippet) && !empty($snippet['title']) && is_string($snippet['title']))
                <?= !empty($h) && is_int($h) ? sprintf('<h%d>', $h) : '' ?>
            {{ $snippet['title'] }}
                <?= !empty($h) && is_int($h) ? sprintf('</h%d>', $h) : '' ?>
        @endif

        @if (is_array($snippet) && !empty($snippet['content']) && is_string($snippet['content']))
            <div class="snippet-content">
                {!! $snippet['content'] !!}
            </div>
        @endif

    </div>

</div>
