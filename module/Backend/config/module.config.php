<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Backend\Controller\FlickrBackend'		 => 'Backend\Controller\FlickrBackendController',
            'Backend\Controller\FlickrBackendInsertor' => 'Backend\Controller\FlickrBackendInsertorController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'flickr-backend' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/flickr-backend[/][:id][/]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Backend\Controller\FlickrBackend',
                    ),
                ),
            ),
        	'flickrscraper' => array(
        		'type'    => 'Segment',
        		'options' => array(
        				'route'    => '/flickr-scraper[/]',
        				'constraints' => array(
        					
        				),
        				'defaults' => array(
        					'controller' => 'Backend\Controller\FlickrBackendInsertor',
        					'action' => 'index',
        				),
        		),
        	),
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);