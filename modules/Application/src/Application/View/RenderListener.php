<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Application\View;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\View\Model;

class RenderListener extends AbstractListenerAggregate
{
    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, [$this, 'prepareLayout'], -1);
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER_ERROR, [$this, 'prepareLayout'], -101);
    }

    public function prepareLayout(MvcEvent $e)
    {
        $layoutModel = $e->getViewModel();

        if (! $layoutModel instanceof Model\ViewModel || $layoutModel instanceof Model\JsonModel) {
            return;
        }

        /** @var ServiceManager $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();

        $config = $serviceManager->get('config')['Application'];

        $layoutModel->setVariables(ArrayUtils::merge(
            $config['layout'],
            [
                'api_keys' => $config['api_keys'],
                'google_analytics' => $config['google_analytics'],
                'lang' => $serviceManager->get('translator')->getLocale(),
                'error' => $e->isError(),
            ]
        ));
    }

}
