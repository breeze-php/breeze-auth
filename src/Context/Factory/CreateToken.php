<?php

namespace Breeze\Auth\Context\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Breeze\Auth\Context\CreateToken as CreateTokenContext;

/**
 * Class CreateToken
 */
class CreateToken implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CreateTokenContext
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): CreateTokenContext
    {
        /** @var array $config */
        $config = $container->get('config')['authentication'];

        return new CreateTokenContext($config['secretKey'], $config['serverName']);
    }
}
