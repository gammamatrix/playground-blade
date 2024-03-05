<?php
/**
 * Playground
 */
namespace Playground\Blade\Concerns;

use Playground\Blade\Assets;
use Playground\Blade\Themes\Theme;

/**
 * \Playground\Blade\Concerns\WithAssets
 */
trait WithAssets
{
    protected bool $initAssets = false;

    /**
     * @var array<string, Assets\Asset>
     */
    protected array $bodyAssets = [];

    /**
     * @var array<string, Assets\Asset>
     */
    protected array $headAssets = [];

    /**
     * @param array<string, mixed> $assets
     */
    public function loadBodyAssets(array $assets = []): self
    {
        $allowed = [
            'comment',
            'script',
            'style',
            'link',
        ];

        foreach ($assets as $key => $meta) {
            $type = '';
            if (is_array($meta)
                && ! empty($meta['asset'])
                && is_string($meta['asset'])
            ) {
                $type = $meta['asset'];
            }
            if ($key && is_string($key) && in_array($type, $allowed)) {

                $asset = null;
                if ($type === 'script') {
                    $asset = new Assets\Script($meta);
                } elseif ($type === 'style') {
                    $asset = new Assets\Style($meta);
                } elseif ($type === 'link') {
                    $asset = new Assets\Link($meta);
                } elseif ($type === 'comment') {
                    $asset = new Assets\Comment($meta);
                }
                if ($asset) {
                    $this->bodyAssets[$key] = $asset;
                }
            }
        }

        return $this;
    }

    /**
     * @param array<string, mixed> $assets
     */
    public function loadHeadAssets(array $assets = []): self
    {
        $allowed = [
            'comment',
            'font',
            'icon',
            'link',
            'script',
            'style',
            'stylesheet',
        ];

        foreach ($assets as $key => $meta) {
            $type = '';
            if (is_array($meta)
                && ! empty($meta['asset'])
                && is_string($meta['asset'])
            ) {
                $type = $meta['asset'];
            }
            if ($key && is_string($key) && in_array($type, $allowed)) {

                $asset = null;
                if ($type === 'font') {
                    $asset = new Assets\Font($meta);
                } elseif ($type === 'icon') {
                    $asset = new Assets\Icon($meta);
                } elseif ($type === 'link') {
                    $asset = new Assets\Link($meta);
                } elseif ($type === 'script') {
                    $asset = new Assets\Script($meta);
                } elseif ($type === 'style') {
                    $asset = new Assets\Style($meta);
                } elseif ($type === 'stylesheet') {
                    $asset = new Assets\Stylesheet($meta);
                } elseif ($type === 'comment') {
                    $asset = new Assets\Comment($meta);
                }

                if ($asset) {
                    $this->headAssets[$key] = $asset;
                }
            }
        }

        return $this;
    }

    /**
     * @return array<string, Assets\Asset>
     */
    public function bodyAssets(Theme $theme = null): array
    {
        if (! $theme) {
            return $this->initAssets()->bodyAssets;
        }

        return array_replace(
            $this->initAssets()->bodyAssets,
            $theme->bodyAssets()
        );
    }

    /**
     * @return array<string, Assets\Asset>
     */
    public function headAssets(Theme $theme = null): array
    {
        if (! $theme) {
            return $this->initAssets()->headAssets;
        }

        return array_replace(
            $this->initAssets()->headAssets,
            $theme->headAssets()
        );
    }
}
