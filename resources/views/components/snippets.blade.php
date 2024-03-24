<?php
// dd([
//     '__METHOD__' => __METHOD__,
//     '__FILE__' => __FILE__,
//     '__LINE__' => __LINE__,
//     '$snippets' => $snippets,
// ]);
if (empty($snippets) || !is_array($snippets)) {
    return;
}
?>
@foreach ($snippets as $snippet)
    @continue(empty($snippet['title']) && empty($snippet['content']))
    <?php
    if (empty($snippet['rank'])) {
        $stack = 'snippet-main';
    } elseif ($snippet['rank'] >= -3000 && $snippet['rank'] <= -2000) {
        $stack = 'snippet-banner';
    } elseif ($snippet['rank'] > -2000 && $snippet['rank'] <= -1000) {
        $stack = 'snippet-header';
    } elseif ($snippet['rank'] > -1000 && $snippet['rank'] < 0) {
        $stack = 'snippet-main-header';
    } elseif ($snippet['rank'] > 0 && $snippet['rank'] <= 1000) {
        $stack = 'snippet-main';
    } elseif ($snippet['rank'] > 1000 && $snippet['rank'] <= 2000) {
        $stack = 'snippet-content';
    } elseif ($snippet['rank'] > 2000 && $snippet['rank'] <= 3000) {
        $stack = 'snippet-main-footer';
    } elseif ($snippet['rank'] > 3000 && $snippet['rank'] <= 4000) {
        $stack = 'snippet-footer-top';
    } elseif ($snippet['rank'] > 4000 && $snippet['rank'] <= 5000) {
        $stack = 'snippet-footer-bottom';
    } else {
        $stack = 'snippet-content';
    }
    $containerClass = isset($snippet['meta']['container']) && isset($snippet['meta']['container']['class']) && is_string($snippet['meta']['container']['class']) ? $snippet['meta']['container']['class'] : 'container-fluid';
    $h = isset($snippet['meta']['header']) && isset($snippet['meta']['header']['level']) && is_numeric($snippet['meta']['header']['level']) && in_array((int) $snippet['meta']['header']['level'], [1, 2, 3, 4, 5, 6]) ? (int) $snippet['meta']['header']['level'] : 3;

    $withTitle = true;

    if (! empty($snippet['snippet_type'])
        && is_string($snippet['snippet_type'])
        && in_array($snippet['snippet_type'], [
            'banner',
            'header',
            'footer',
    ])) {
        $withTitle = false;
    }

    $attributes = trim(implode(' ', array_filter([
        sprintf('data-id="%1$s"', $snippet['id'] ?? ''),
        sprintf('data-created_at="%1$s"', $snippet['created_at'] ?? ''),
        sprintf('data-updated_at="%1$s"', $snippet['updated_at'] ?? ''),
        sprintf('data-published_at="%1$s"', $snippet['published_at'] ?? ''),
        sprintf('data-published="%1$s"', $snippet['published'] ?? ''),
        sprintf('data-allow_public="%1$s"', $snippet['allow_public'] ?? 0),
        sprintf('data-allow_guest="%1$s"', $snippet['allow_guest'] ?? 0),
        sprintf('data-allow_admin="%1$s"', $snippet['allow_admin'] ?? 0),
        sprintf('data-rank="%1$s"', $snippet['rank'] ?? ''),
    ])));
    ?>
    @push($stack)
        <div class="{{ $containerClass }}" {!! $attributes !!}>

            <div class="snippet">

                @if ($withTitle && !empty($snippet['title']))
                    <?= sprintf('<h%d>', $h) ?>{{ $snippet['title'] }}<?= sprintf('</h%d>', $h) ?>
                @endif

                @if (!empty($snippet['content']))
                    <div class="snippet-content">
                        {!! $snippet['content'] !!}
                    </div>
                @endif

            </div>

        </div>
    @endpush
@endforeach
