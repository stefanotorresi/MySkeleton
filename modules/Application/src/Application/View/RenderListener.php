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
use Zend\View\Model;

class RenderListener extends AbstractListenerAggregate
{
    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, array($this, 'prepareLayout'), -1);
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'prepareLayout'), -101);
    }

    public function prepareLayout(MvcEvent $e)
    {
        $layoutModel = $e->getViewModel();

        if (! $layoutModel instanceof Model\ViewModel) {
            return;
        }

        /** @var ServiceManager $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();

        $config = $serviceManager->get('config')['Application'];

        $layoutModel->setVariables($config['layout']);
        $layoutModel->setVariable('api_keys', $config['api_keys']);
        $layoutModel->setVariable('google_analytics', $config['google_analytics']);

        $layoutModel->lang = $serviceManager->has('translator') ?
            $serviceManager->get('translator')->getLocale() : $config['lang'];
    }

}
