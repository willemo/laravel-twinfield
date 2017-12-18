<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Willemo\LaravelTwinfield\ApiConnectorFacade;
use Willemo\LaravelTwinfield\TwinfieldServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            TwinfieldServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Twinfield' => ApiConnectorFacade::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('twinfield.authType', 'credentials');
        $app['config']->set('twinfield.username', 'Username');
        $app['config']->set('twinfield.password', 'Password');
        $app['config']->set('twinfield.organisation', 'Organisation');
        $app['config']->set('twinfield.office', 'Office');
    }
}
