<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            // Put front-end settings there
            // (for example, url rules).
            // application components
            'components' => array(
                // uncomment the following to enable URLs in path-format
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => FALSE,
                    'rules' => array(
                        //url mặc định của yii
                        '<controller:\w+>/<id:\d+>' => '<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    ),
                ),
                'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                // database settings are configured in database.php
                'db' => require(dirname(__FILE__) . '/database.php'),
                'errorHandler' => array(
                    // use 'site/error' action to display errors
                    'errorAction' => 'site/error',
                ),
                'log' => array(
                    'class' => 'CLogRouter',
                    'routes' => array(
                        array(
                            'class' => 'CFileLogRoute',
                            'levels' => 'error, warning',
                        ),
                    // uncomment the following to show log messages on web pages
                    /*
                      array(
                      'class'=>'CWebLogRoute',
                      ),
                     */
                    ),
                ),
//                'cache' => array(
//                    'class' => 'system.caching.CMemCache',
//                    'servers' => array(
//                        array('host' => 'localhost', 'port' => 11211, 'weight' => 60),
//                    ),
//                ),
            ),
                )
);
