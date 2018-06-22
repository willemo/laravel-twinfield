<?php

namespace Willemo\LaravelTwinfield\Factories;

use PhpTwinfield\ApiConnectors\BaseApiConnector;
use Willemo\LaravelTwinfield\Exceptions\InvalidApiConnectorNameException;

/**
 * Interface ApiConnectorFactoryInterface
 *
 * @package Willemo\LaravelTwinfield\Factories
 */
interface ApiConnectorFactoryInterface
{
    /**
     * Get an API connector by its name.
     *
     * @param  string $name
     * @return BaseApiConnector
     * @throws InvalidApiConnectorNameException
     */
    public function get(string $name): BaseApiConnector;
}
