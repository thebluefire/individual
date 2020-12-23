<?php

namespace ContainerRejIZEx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MqxDq8zService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.mqxDq8z' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.mqxDq8z'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'Genre' => ['privates', '.errored..service_locator.mqxDq8z.App\\Entity\\Genre', NULL, 'Cannot autowire service ".service_locator.mqxDq8z": it references class "App\\Entity\\Genre" but no such service exists.'],
        ], [
            'Genre' => 'App\\Entity\\Genre',
        ]);
    }
}
