<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Backend\Controller\Index' => 'Backend\Controller\IndexController',
			'Backend\Controller\Pages' => 'Backend\Controller\PagesController',
		) ,
	) ,
	'router' => array(
		'routes' => array(
			'backend' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/backend',
					'defaults' => array(
						'controller' => 'Backend\Controller\Index',
						'action' => 'index',
					) ,
				) ,
				'may_terminate' => true,
				'child_routes' => array(
					'about' => array(
						'type' => 'Literal',
						'options' => array(
							'route' => '/about',
							'defaults' => array(
								'controller' => 'Backend\Controller\Index',
								'action' => 'about',
							) ,
						) ,
					) ,
					'pages' => array(
						'type' => 'Literal',
						'options' => array(
							'route' => '/pages',
							'defaults' => array(
								'controller' => 'Backend\Controller\Pages',
								'action' => 'pages',
							) ,
						) ,
					) ,
					'addpage' => array(
						'type' => 'Literal',
						'options' => array(
							'route' => '/addpage',
							'defaults' => array(
								'controller' => 'Backend\Controller\Pages',
								'action' => 'addpage',
							) ,
						) ,
					) ,
				) ,
			) ,
		) ,
	) ,
	'view_manager' => array(
		'template_path_stack' => array(
			'backend' => __DIR__ . '/../view',
		) ,
	) ,
	'strategies' => array(
		'ViewJsonStrategy',
	) ,
);