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
);
