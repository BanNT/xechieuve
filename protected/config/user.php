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
                        //url menu
                        'xe-tim-khach' => 'xe_tim_khach',
                        'khach-tim-xe' => 'khach_tim_xe',
                        'tin-tuc' => 'tin_tuc',
                        'tro-giup' => 'tro_giup',
                        'rao-vat' => 'rao_vat',
                        'lien-he' => 'lien_he',
                        'dang-tin' => 'dang_tin',
                        //url đăng itn rao vặt, khach tìm xe, xe tìm khách
                        'khach-tim-xe/dang-tin' => 'khach_tim_xe/dang_tin',
                        'xe-tim-khach/dang-tin' => 'xe_tim_khach/dang_tin',
                        'rao-vat/dang-tin' => 'rao_vat/dang_tin',
                        //url xem chi tiết tin rao vặt, khách tìm xe, xe tìm khách
                        'khach-tim-xe/xem-chi-tiet/<title>/<id:\d+>' => 'khach_tim_xe/xem_chi_tiet',
                        'xe-tim-khach/xem-chi-tiet/<title>/<id:\d+>' => 'xe_tim_khach/xem_chi_tiet',
                        'rao-vat/xem-chi-tiet/<title>/<id:\d+>' => 'rao_vat/xem_chi_tiet',
                        'tin-tuc/xem-chi-tiet/<title>/<id:\d+>' => 'tin_tuc/xem_chi_tiet',
                        //url lọc theo loại xe
                        'khach-tim-xe/loc-theo-xe/<title>/<id:\d+>' => 'khach_tim_xe/loc_theo_xe',
                        'xe-tim-khach/loc-theo-xe/<title>/<id:\d+>' => 'xe_tim_khach/loc_theo_xe',
                        //url đăng ký tài khoản
                        'dang-ky' => 'dang_ky',
                        //url quản lý của khách hàng
                        'dang-nhap'=>'khach_hang/dang_nhap',
                         'dang-xuat'=>'khach_hang/dang_xuat',
                        'tin-da-dang/<title>/<id:\d+>'=>'khach_hang/tin_da_dang',
                        'lam-moi-tin-dang/<title>/<id:\d+>'=>'khach_hang/lam_moi_tin',
                        'xoa-tin/<title>/<id:\d+>'=>'khach_hang/xoa_tin_da_dang',
                        'sua-tin/<title>/<id:\d+>'=>'khach_hang/sua_tin_dang',
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
