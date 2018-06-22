<?php

namespace Willemo\LaravelTwinfield;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Willemo\LaravelTwinfield\Factories\ApiConnectorFactory;
use Willemo\LaravelTwinfield\Factories\ApiConnectorFactoryInterface;

/**
 * Class TwinfieldServiceProvider
 *
 * @package Willemo\LaravelTwinfield
 */
class TwinfieldServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            ApiConnectorFactoryInterface::class,
            function (Application $app) {
                return new ApiConnectorFactory($app['config']['twinfield']);
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/twinfield.php' => config_path('twinfield.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            ApiConnectorFactoryInterface::class,
        ];
    }
}
