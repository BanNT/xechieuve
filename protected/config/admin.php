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
                    'rules' => array(
                        //url quản lý khách hàng
                        'quan-ly-khach-hang' => 'manage_customer/admin',
                        'them-khach-hang' => 'manage_customer/create',

                        //url tin tuc
                        'quan-ly-tin-tuc'=>'tin_tuc/admin',
                        'quan-ly-loai-tin' => 'loai_tin/admin',
                        
                        'them-tin-tuc'=>'tin_tuc/create',
                        'quan-ly-tin-tuc/thong-tin-tin-tuc/id/<id:\d+>' => 'tin_tuc/view',
                        'quan-ly-tin-tuc/xoa-tin/id/<id:\d+>'=>'tin_tuc/Delete_tintuc',
                        'quan-ly-tin-tuc/sua-tin/id/<id:\d+>'=>'tin_tuc/update',

                        //url quản lý khách hàng
                        'quan-ly-khach-hang'=>'manage_customer/admin',
                        'quan-ly-khach-hang/xoa-khach-hang/id/<id:\d+>'=>'manage_customer/delete_user',
                        'quan-ly-khach-hang/sua-thong-tin-khach-hang/id/<id:\d+>'=>'manage_customer/update',
                        'them-khach-hang'=>'manage_customer/create',
                        'quan-ly-khach-hang/thong-tin-khach-hang/id/<id:\d+>'=>'manage_customer/view',
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
//                    'allowAutoLogin' => true,
                ),
            ),
                )
);
