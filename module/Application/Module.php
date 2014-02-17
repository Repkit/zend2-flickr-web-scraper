<?php

namespace Application;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
    	$application   = $e->getApplication();
		$sm            = $application->getServiceManager();

        try {
            $dbInstance = $application->getServiceManager()
                                      ->get('Zend\Db\Adapter\Adapter');
            $dbInstance->getDriver()->getConnection()->connect();
        } catch (\Exception $ex) {
            $ViewModel = $e->getViewModel();
            $ViewModel->setTemplate('layout/layout');
                 
            $content = new \Zend\View\Model\ViewModel();
            $content->setTemplate('error/dbofflineerror');
            
            $ViewModel->setVariable('content', $sm->get('ViewRenderer')
                                                  ->render($content));
            
            exit($sm->get('ViewRenderer')->render($ViewModel));
        }
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
