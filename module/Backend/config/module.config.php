<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Backend\Controller\Index' => 'Backend\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'backend' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/backend[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Backend\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => array(
                'layout/layout'           => __DIR__ . '/../view/layout/backend.phtml',
                'application/index/index' => __DIR__ . '/../view/backend/index/index.phtml',
        ),
        'template_path_stack' => array(
            'backend' => __DIR__ . '/../view',
        ),
    ),
);
