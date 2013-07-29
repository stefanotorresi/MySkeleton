<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Application;

use Application\View\RenderListener;
use Zend\ModuleManager\Feature;
use Zend\Mvc\ModuleRouteListener;
use ZfcBase\Module\AbstractModule;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ApplicationInterface;

class Module extends AbstractModule implements
    Feature\ConfigProviderInterface
{
    public function bootstrap(ModuleManager $moduleManager, ApplicationInterface $app)
    {
        $eventManager = $app->getEventManager();

        $renderListener = new View\RenderListener();
        $renderListener->attach($eventManager);

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getDir()
    {
        return __DIR__ . '/../..';
    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }
}
