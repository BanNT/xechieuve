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
                // database settings are configured in database.php
                'db' => require(dirname(__FILE__) . '/database.php'),
                'errorHandler' => array(
                    // use 'site/error' action to display errors
                    'errorAction' => 'site/error',
                ),
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                ),
            ),
                )
);
