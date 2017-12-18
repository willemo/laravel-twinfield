<?php

namespace Tests;

use PhpTwinfield\Exception;
use Willemo\LaravelTwinfield\Exceptions\InvalidApiConnectorNameException;

/**
 * Class ApiConnectorFactoryTest
 *
 * @package Tests
 *
 * @coversDefaultClass Willemo\LaravelTwinfield\ApiConnectorFactory
 */
class ApiConnectorFactoryTest extends TestCase
{
    /**
     * @covers ::get
     */
    public function testGet(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed logging in using the credentials.');

        \Twinfield::get('Customer');
    }

    /**
     * @covers ::get
     */
    public function testInvalidGet(): void
    {
        $this->expectException(InvalidApiConnectorNameException::class);
        $this->expectExceptionMessage('ApiConnector "FooBar" does not exist.');

        \Twinfield::get('FooBar');
    }
}
