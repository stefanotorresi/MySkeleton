<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Application;

use Application\View\RenderListener;
use MyBase\BaseModule;
use Zend\Console\Adapter\AdapterInterface as ConsoleAdapterInterface;
use Zend\ModuleManager\Feature;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module extends BaseModule
    implements Feature\ConsoleUsageProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDir()
    {
        return __DIR__ . '/../..';
    }

    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function onBootstrap(MvcEvent $event)
    {
        $eventManager = $event->getApplication()->getEventManager();

        $renderListener = new View\RenderListener();
        $moduleRouteListener = new ModuleRouteListener();

        $eventManager->attach($renderListener);
        $eventManager->attach($moduleRouteListener);
    }

    /**
     * {@inheritdoc}
     */
    public function getConsoleUsage(ConsoleAdapterInterface $console)
    {
        return [
            'development (disable|enable)' => 'Disable or enable development mode',
        ];
    }
}
