<?php

namespace Willemo\LaravelTwinfield\Factories;

use PhpTwinfield\ApiConnectors\BaseApiConnector;
use PhpTwinfield\Secure\WebservicesAuthentication;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Willemo\LaravelTwinfield\Exceptions\InvalidApiConnectorNameException;

/**
 * Class ApiConnectorFactory
 *
 * @package Willemo\LaravelTwinfield\Factories
 */
class ApiConnectorFactory implements ApiConnectorFactoryInterface
{
    /**
     * @var array
     */
    protected $config;

    /**
     * ApiConnectorFactory constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $resolver = new OptionsResolver();

        $this->configureOptions($resolver);

        $this->config = $resolver->resolve($config);
    }

    /**
     * Get an API connector by its name.
     *
     * @param  string $name
     * @return BaseApiConnector
     * @throws InvalidApiConnectorNameException
     */
    public function get(string $name): BaseApiConnector
    {
        $className = $this->buildClassName($name);

        if (!class_exists($className)) {
            throw new InvalidApiConnectorNameException(sprintf(
                'ApiConnector "%s" does not exist.',
                $name
            ));
        }

        /** @var BaseApiConnector $apiConnector */
        $apiConnector = new $className($this->getWebservicesAuthentication());

        if (!$apiConnector instanceof BaseApiConnector) {
            throw new InvalidApiConnectorNameException(sprintf(
                'ApiConnector "%s" is not an instance of BaseApiConnector.',
                $name
            ));
        }

        return $apiConnector;
    }

    /**
     * Get the Twinfield WebservicesAuthentication.
     *
     * @return WebservicesAuthentication
     */
    protected function getWebservicesAuthentication(): WebservicesAuthentication
    {
        return new WebservicesAuthentication(
            config('twinfield.username'),
            config('twinfield.password'),
            config('twinfield.organisation')
        );
    }

    /**
     * Build a full class name from the given name.
     *
     * @param  string $name
     * @return string
     */
    protected function buildClassName(string $name): string
    {
        if (class_exists($name)) {
            return $name;
        }

        $className = $name;

        if (!str_ends_with($className, 'ApiConnector')) {
            $className .= 'ApiConnector';
        }

        return sprintf('\PhpTwinfield\ApiConnectors\%s', $className);
    }

    /**
     * Configure the options resolver.
     *
     * @param OptionsResolver $resolver
     */
    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'authType' => 'credentials',
            'autoRedirect' => false,
            'username' => null,
            'password' => null,
            'clientId' => null,
            'clientSecret' => null,
            'returnUrl' => null,
        ]);

        $resolver->setRequired([
            'authType',
            'organisation',
            'office',
        ]);

        $resolver->setAllowedValues('authType', [
            'credentials',
            'oauth',
        ]);

        $resolver->setNormalizer(
            'username',
            function (Options $options, $username) {
                $this->checkOption(
                    $options,
                    $username,
                    'credentials',
                    'username'
                );

                return $username;
            }
        );

        $resolver->setNormalizer(
            'password',
            function (Options $options, $password) {
                $this->checkOption(
                    $options,
                    $password,
                    'credentials',
                    'password'
                );

                return $password;
            }
        );

        $resolver->setNormalizer(
            'clientId',
            function (Options $options, $clientId) {
                $this->checkOption(
                    $options,
                    $clientId,
                    'oauth',
                    'clientId'
                );

                return $clientId;
            }
        );

        $resolver->setNormalizer(
            'clientSecret',
            function (Options $options, $clientSecret) {
                $this->checkOption(
                    $options,
                    $clientSecret,
                    'oauth',
                    'clientSecret'
                );

                return $clientSecret;
            }
        );

        $resolver->setNormalizer(
            'returnUrl',
            function (Options $options, $returnUrl) {
                $this->checkOption(
                    $options,
                    $returnUrl,
                    'oauth',
                    'returnUrl'
                );

                return $returnUrl;
            }
        );
    }

    /**
     * Checks if the required option exists.
     *
     * @param Options $options
     * @param mixed   $option
     * @param string  $authType
     * @param string  $optionName
     * @throws InvalidOptionsException
     */
    protected function checkOption(
        Options $options,
        $option,
        string $authType,
        string $optionName
    ): void {
        if ($options['authType'] === $authType &&
            empty($option)
        ) {
            throw new InvalidOptionsException(sprintf(
                '"%s" is required when "authType" is "%s".',
                $optionName,
                $authType
            ));
        }
    }
}
