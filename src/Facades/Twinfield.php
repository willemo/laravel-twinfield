<?php

namespace Willemo\LaravelTwinfield\Facades;

use Illuminate\Support\Facades\Facade;
use Willemo\LaravelTwinfield\Factories\ApiConnectorFactoryInterface;

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
