<?php

namespace Tests;

use PhpTwinfield\ApiConnectors\CustomerApiConnector;
use Willemo\LaravelTwinfield\Exceptions\InvalidApiConnectorNameException;
use Willemo\LaravelTwinfield\Facades\Twinfield;
use Willemo\LaravelTwinfield\TwinfieldServiceProvider;

/**
 * Class ApiConnectorFactoryTest
 *
 * @package Tests
 *
 * @coversDefaultClass \Willemo\LaravelTwinfield\Factories\ApiConnectorFactory
 */
class ApiConnectorFactoryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::get
     * @covers ::getWebservicesAuthentication
     * @covers ::buildClassName
     * @covers ::configureOptions
     * @covers ::checkOption
     */
    public function testGet(): void
    {
        $this->assertInstanceOf(
            CustomerApiConnector::class,
            Twinfield::get('Customer')
        );
    }

    /**
     * @covers ::get
     */
    public function testGetWithNotExistingClass(): void
    {
        $this->expectException(InvalidApiConnectorNameException::class);
        $this->expectExceptionMessage('ApiConnector "FooBar" does not exist.');

        Twinfield::get('FooBar');
    }

    /**
     * @covers ::get
     * @covers ::buildClassName
     */
    public function testGetWithInvalidClass(): void
    {
        $this->expectException(InvalidApiConnectorNameException::class);
        $this->expectExceptionMessage(sprintf(
            'ApiConnector "%s" is not an instance of BaseApiConnector.',
            TwinfieldServiceProvider::class
        ));

        Twinfield::get(TwinfieldServiceProvider::class);
    }
}
