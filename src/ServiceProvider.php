<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Blade;

/**
 * \Playground\Blade\ServiceProvider
 */
class ServiceProvider extends AuthServiceProvider
{
    protected string $package = 'playground-blade';

    public const VERSION = '73.0.0';

    public function boot(): void
    {
        $config = config($this->package);
        if (! empty($config)) {

            $this->loadViewsFrom(
                dirname(__DIR__).'/resources/views',
                'playground'
            );

            Blade::componentNamespace('Playground\\Blade\\View\\Components', 'playground');

            if ($this->app->runningInConsole()) {
                // Publish configuration
                $this->publishes([
                    sprintf('%1$s/config/playground-blade.php', dirname(__DIR__)) => config_path('playground-blade.php'),
                ], 'playground-config');

                $this->publishesAssets();
            }

            $this->about();
        }
    }

    public function about(): void
    {
        $config = config($this->package);
        $config = is_array($config) ? $config : [];

        $load = ! empty($config['load']) && is_array($config['load']) ? $config['load'] : [];

        $libs = ! empty($config['libs']) && is_array($config['libs']) ? $config['libs'] : [];
        $libs_head = ! empty($libs['head']) && is_array($libs['head']) ? implode(', ', array_keys($libs['head'])) : '';
        $libs_body = ! empty($libs['body']) && is_array($libs['body']) ? implode(', ', array_keys($libs['body'])) : '';

        $version = $this->version();

        AboutCommand::add('Playground: Blade', fn () => [
            '<fg=yellow;options=bold>Load</> Views' => ! empty($load['views']) ? '<fg=green;options=bold>ENABLED</>' : '<fg=yellow;options=bold>DISABLED</>',

            '<fg=blue;options=bold>View</> [layout]' => sprintf('[%s]', $config['layout']),
            '<fg=blue;options=bold>View</> [prefix]' => sprintf('[%s]', $config['view']),

            '<fg=blue;options=bold>Assets</> [head]' => sprintf('[%s]', $libs_head),
            '<fg=blue;options=bold>Assets</> [body]' => sprintf('[%s]', $libs_body),

            'Package' => $this->package,
            'Version' => $version,
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            sprintf('%1$s/config/%2$s.php', dirname(__DIR__), $this->package),
            $this->package
        );

        $this->app->scoped('playground-blade-ui', function () {
            return new Ui();
        });
    }

    public function version(): string
    {
        return static::VERSION;
    }

    /**
     * Publishing assets for Blade UI sites.
     *
     * Tags with published assets destinations:
     *
     * playground-blade-js
     * - vendor/playground/blade.js
     *
     * playground-blade-components
     * - vendor/playground/components
     * - vendor/playground/pagination
     *
     * playground-blade-errors
     * - views/errors
     *
     * playground-blade-layouts
     * - vendor/playground/components
     * - vendor/playground/pagination
     *
     * playground-blade-css
     * - vendor/playground/backgrounds
     * - vendor/playground/bootstrap
     * - vendor/playground/ckeditor
     *
     * NOTE: Pagination is under two tags: playground-blade-components
     */
    public function publishesAssets(): void
    {
        // Publish JavaScript assets
        $this->publishes([sprintf('%1$s/resources/js/playground-blade.js', dirname(__DIR__)) => public_path('vendor/playground/blade.js'),
        ], 'playground-blade-js');

        // Publish Blade: Components
        $this->publishes([sprintf('%1$s/resources/views/components', dirname(__DIR__)) => resource_path('vendor/playground/components'),
        ], 'playground-blade-components');

        // Publish Blade: Components - Pagination
        $this->publishes([sprintf('%1$s/resources/views/pagination', dirname(__DIR__)) => resource_path('vendor/playground/pagination'),
        ], 'playground-blade-components');

        // Publish Blade: Error pages
        $this->publishes([sprintf('%1$s/resources/views/errors', dirname(__DIR__)) => resource_path('views/errors'),
        ], 'playground-blade-errors');

        // Publish Blade: Layouts
        $this->publishes([sprintf('%1$s/resources/views/layouts', dirname(__DIR__)) => resource_path('vendor/playground/layouts'),
        ], 'playground-blade-layouts');

        // Publish Blade: Layouts - Pagination
        $this->publishes([sprintf('%1$s/resources/views/pagination', dirname(__DIR__)) => resource_path('vendor/playground/pagination'),
        ], 'playground-blade-layouts');

        // Publish CSS assets
        $this->publishes([sprintf('%1$s/resources/css', dirname(__DIR__)) => public_path('vendor/playground'),
        ], 'playground-blade-css');

        // Publish body backgrounds
        $this->publishes([sprintf('%1$s/resources/backgrounds', dirname(__DIR__)) => public_path('vendor/playground/backgrounds'),
        ], 'playground-blade-css');
    }
}
