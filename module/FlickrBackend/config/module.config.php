<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'FlickrBackend\Controller\FlickrBackend'		 => 'FlickrBackend\Controller\FlickrBackendController',
            'FlickrBackend\Controller\FlickrBackendInsertor' => 'FlickrBackend\Controller\FlickrBackendInsertorController',
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
                        'controller' => 'FlickrBackend\Controller\FlickrBackend',
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
        					'controller' => 'FlickrBackend\Controller\FlickrBackendInsertor',
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