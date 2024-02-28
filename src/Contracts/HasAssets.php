<?php
/**
 * Playground
 */
namespace Playground\Blade\Contracts;

use Playground\Blade\Assets;

/**
 * \Playground\Blade\Contracts\HasAssets
 */
interface HasAssets
{
    public function initAssets(): self;

    /**
     * @param array<string, mixed> $assets
     */
    public function loadBodyAssets(array $assets = []): self;

    /**
     * @param array<string, mixed> $assets
     */
    public function loadHeadAssets(array $assets = []): self;

    /**
     * @return array<string, Assets\Asset>
     */
    public function bodyAssets(): array;

    /**
     * @return array<string, Assets\Asset>
     */
    public function headAssets(): array;
}
