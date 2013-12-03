<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>false,
			'ipFilters'=>array('*', '127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
                'urlManager'=>array(
                    'urlFormat'=>'path',
                    'rules' => array(
                            // REST routes for CRUD operations
                            'POST <controller:\w+>s' => '<controller>/create',
                            '<controller:\w+>s'      => '<controller>/index',
                    
                            'PUT <controller:\w+>/<id:\d+>'    => '<controller>/update',
                            'DELETE <controller:\w+>/<id:\d+>' => '<controller>/delete',
                            '<controller:\w+>/<id:\d+>'        => '<controller>/view',
                    
                            // normal routes for CRUD operations
                            '<controller:\w+>s/create' => '<controller>/create',
                            '<controller:\w+>/<id:\d+>/<action:update|delete>' => '<controller>/<action>',
                    )
                ),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=loc_orm',
			'emulatePrepare' => true,
			'username' => 'loc_orm',
			'password' => '12341234',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
