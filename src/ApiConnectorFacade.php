<?php

namespace Willemo\LaravelTwinfield;

use Illuminate\Support\Facades\Facade;

class ApiConnectorFacade extends Facade
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
