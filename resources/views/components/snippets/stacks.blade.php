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
foreach ($snippets as $snippet) {
    if (empty($snippet) || !is_array($snippet)) {
        $snippet = [];
    }
    if (empty($snippet['title']) && empty($snippet['content'])) {
        continue;
    }
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
    $containerClass = 'container-fluid';
    $h = 3;
    if (!empty($snippet['meta']) && is_array($snippet['meta'])) {
        if (isset($snippet['meta']['container']) && is_array($snippet['meta']['container']) && isset($snippet['meta']['container']['class']) && is_string($snippet['meta']['container']['class'])) {
            $containerClass = $snippet['meta']['container']['class'];
        }
        if (isset($snippet['meta']['header']) && is_array($snippet['meta']['header']) && isset($snippet['meta']['header']['level']) && is_numeric($snippet['meta']['header']['level']) && in_array((int)$snippet['meta']['header']['level'], [1, 2, 3, 4, 5, 6])) {
            $h = (int)$snippet['meta']['header']['level'];
        }
    }

    $withTitle = true;

    if (!empty($snippet['snippet_type'])
        && is_string($snippet['snippet_type'])
        && in_array($snippet['snippet_type'], [
            'banner',
            'header',
            'footer',
        ])) {
        $withTitle = false;
    }

    $attributes = trim(implode(' ', array_filter([
        sprintf('data-id="%1$s"', !empty($snippet['id']) && is_string($snippet['id']) ? $snippet['id'] : ''),
        sprintf('data-created_at="%1$s"', !empty($snippet['created_at']) && is_string($snippet['created_at']) ? $snippet['created_at'] : ''),
        sprintf('data-updated_at="%1$s"', !empty($snippet['updated_at']) && is_string($snippet['updated_at']) ? $snippet['updated_at'] : ''),
        sprintf('data-published_at="%1$s"', !empty($snippet['published_at']) && is_string($snippet['published_at']) ? $snippet['published_at'] : ''),
        sprintf('data-published="%1$s"', !empty($snippet['published']) && is_string($snippet['published']) ? $snippet['published'] : ''),
        sprintf('data-allow_public="%1$s"', !empty($snippet['allow_public']) ? 1 : 0),
        sprintf('data-allow_guest="%1$s"', !empty($snippet['allow_guest']) ? 1 : 0),
        sprintf('data-allow_admin="%1$s"', !empty($snippet['allow_admin']) ? 1 : 0),
        sprintf('data-rank="%1$s"', !empty($snippet['rank']) && is_string($snippet['rank']) ? $snippet['rank'] : ''),
    ])));
}
?>
@push($stack)
    @include('playground::components/snippets/stack', [
        'containerClass' => $containerClass,
        'h' => $h,
        'snippet' => $snippet,
        'withTitle' => $withTitle,
        'attributes' => $attributes,
    ])
@endpush
@endforeach
