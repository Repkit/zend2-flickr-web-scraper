<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Flickr\Controller\Flickr' => 'Flickr\Controller\FlickrController',
            'Flickr\Controller\FlickrBackend' => 'Flickr\Controller\FlickrBackend',
        ),
    ),
    'router' => array(
        'routes' => array(
            'flickr' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/flickr',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Flickr\Controller',
                        'controller'    => 'Flickr',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/flickr[/:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            	'controller' => 'Flickr\Controller\FlickrController',
                           		'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Flickr' => __DIR__ . '/../view',
        	'ViewJsonStrategy',
        ),
    ),
);
