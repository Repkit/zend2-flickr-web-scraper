<?php
return array(
    'modules' => array(
        'Application',
    	'DoctrineModule',
    	'DoctrineORMModule',
    	'ZendDeveloperTools',
    	'ZfcBase','ZfcUser','BjyProfiler',
    	'Flickr','FlickrBackend'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
    ),
);