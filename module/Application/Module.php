<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Application\Model\Charytatywnie;
use Application\Model\CharytatywnieTable;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $application = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        // Just a call to the translator, nothing special!
        $serviceManager->get('translator');
        $this->initTranslator($e);
    }
 protected function initTranslator(MvcEvent $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();

                 $session = new Container('language');
                 
                 
        

        $translator = $serviceManager->get('translator');
        $translator
            ->setLocale($session->language)
            ->setFallbackLocale('en_US');
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
    
    public function getServiceConfig()
    {
       
        return array(
            'factories' => array(
                                
                'Charytatywnie\Model\CharytatywnieTable'  =>  function($sm)  {
                    $tableGateway = $sm->get('CharytatywnieTableGateway');
                    $table = new CharytatywnieTable($tableGateway);
                    return $table;
                },
                'CharytatywnieTableGateway' =>function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Charytatywnie());
                    return new TableGateway('charytatywnie', $dbAdapter, null, $resultSetPrototype);
                },  
                
                'mail.transport' => function ($sm) {
                    $config = $sm->get('Config');
                    $transport = new \Zend\Mail\Transport\Smtp();                
                    $transport->setOptions(new \Zend\Mail\Transport\SmtpOptions($config['mail']['transport']));
                    return $transport;
                },
                
            ),
        );
    }
}
