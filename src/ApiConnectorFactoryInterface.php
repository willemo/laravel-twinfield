<?php

namespace Willemo\LaravelTwinfield;

use PhpTwinfield\ApiConnectors\BaseApiConnector;
use Willemo\LaravelTwinfield\Exceptions\InvalidApiConnectorNameException;

interface ApiConnectorFactoryInterface
{
    /**
     * Get an API connector by its name.
     *
     * @param $name
     * @return BaseApiConnector
     * @throws InvalidApiConnectorNameException
     */
    public function get($name): BaseApiConnector;
}
