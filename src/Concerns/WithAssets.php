<?php
/**
 * Playground
 */
namespace Playground\Blade\Concerns;

use Playground\Blade\Assets;

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

    public function initAssets(): self
    {
        if ($this->initAssets) {
            return $this;
        }

        $config = config('playground-blade');

        if (is_array($config)) {
            if (! empty($config['assets']) && is_array($config['assets'])) {
                if (! empty($config['assets']['head']) && is_array($config['assets']['head'])) {
                    $this->loadHeadAssets($config['assets']['head']);
                }
                if (! empty($config['assets']['body']) && is_array($config['assets']['body'])) {
                    $this->loadBodyAssets($config['assets']['body']);
                }
            }
        }

        $this->initAssets = true;

        return $this;
    }

    /**
     * @param array<string, mixed> $assets
     */
    public function loadBodyAssets(array $assets = []): self
    {
        $allowed = [
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
    public function bodyAssets(): array
    {
        return $this->initAssets()->bodyAssets;
    }

    /**
     * @return array<string, Assets\Asset>
     */
    public function headAssets(): array
    {
        return $this->initAssets()->headAssets;
    }
}
