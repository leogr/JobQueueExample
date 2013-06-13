<?php

return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'default' => array(
                    'options' => array(
                        'route' => '<controller> <action>',
                        'defaults' => array(
                            'controller' 	=> 'JobQueueExample\Controller\Example',
                            '__NAMESPACE__' => 'JobQueueExample\Controller'
                        )
                    )
                ),
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'JobQueueExample\Controller\Example' => 'JobQueueExample\Controller\ExampleController',
        ),
    ),

    'controller_plugins' => array(
        'invokables' => array(
            'queue' => 'ZendQueue\Controller\Plugin\Queue',
        )
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'ZendQueue\Service\QueueAdapterAbstractServiceFactory',
            'ZendQueue\Service\QueueAbstractServiceFactory',
        ),
     ),

    'queue_adapters' => array(
        'ZendQueue\Adapter\MongoCappedCollection' => array(
            'adapter'       => 'ZendQueue\Adapter\MongoCappedCollection',
            'options'       => array(
                'driverOptions' => array(
                    //Add your config in local.php!
                    //'host' 				 => '',
                    //'dbname'    		 => '',
                ),
            ),
        ),
    ),

    'queues' => array(
        'mongo-capped-queue' => array(
            'name'      => 'defaultCapped',
            'adapter'   => 'ZendQueue\Adapter\MongoCappedCollection',
        )
    ),

);
