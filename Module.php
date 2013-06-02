<?php
namespace JobQueueExample;


use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use ZendQueue\Queue\Queue;
use JobQueueExample\Controller\WorkerController;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
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

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'JobQueueExample\Controller\Worker' => function(\Zend\Mvc\Controller\ControllerManager $sm) {
                    return new WorkerController($sm->getServiceLocator()->get('mongo-capped-queue'));
                },
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'db-queue' => function($sm) {
                    $config = $sm->get('config');
                    $queue = new Queue('default', 'db', array(
                        'driverOptions' 	=> $config['db']
                    ));
                    return $queue;
                },
                'mongo-queue' => function($sm) {
                    $config = $sm->get('config');
                    $queue = new Queue('default', 'MongoCollection', array(
                        'driverOptions' 	=> $config['mongodb']
                    ));
                    return $queue;
                },
                'mongo-capped-queue' => function($sm) {
                    $config = $sm->get('config');
                    $queue = new Queue('default', 'MongoCappedCollection', array(
                        'driverOptions' 	=> $config['mongodb']
                    ));
                    return $queue;
                },

             ),
        );
    }
}