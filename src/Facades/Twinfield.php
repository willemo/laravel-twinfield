<?php

namespace Willemo\LaravelTwinfield\Facades;

use Illuminate\Support\Facades\Facade;
use PhpTwinfield\ApiConnectors\BaseApiConnector;
use Willemo\LaravelTwinfield\Factories\ApiConnectorFactoryInterface;

/**
 * Class Twinfield
 *
 * @package Willemo\LaravelTwinfield\Facades
 * @method static BaseApiConnector get($name)
 */
class Twinfield extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return ApiConnectorFactoryInterface::class;
    }
}
