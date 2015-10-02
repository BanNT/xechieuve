<?php

/**
 * Quản lý hiển thị menu người dùng
 */
class menu extends CWidget {

    /**
     * @var string
     */
    public $controller;

    /**
     * Mặc định $urlDangTin là controller dang_tin action index.
     * @var string
     */
    public $urlDangTin = 'dang-tin';

    /**
     * Danh sách những loại tin khách hàng có thể đăng
     * @var array
     */
    private $__tinDang = [
        'xe-tim-khach',
        'khach-tim-xe',
        'rao-vat'
    ];

    public function init() {
        
    }

    public function run() {
        $route = explode('/', Yii::app()->controller->route);
        $controller =  array_shift($route);
        $this->controller = str_replace('_', '-', $controller);

        //Nếu controller có trong $__tinDang thì dang_tin sẽ là action của
        //controller đó
        if (in_array($this->controller, $this->__tinDang)) {
            $this->urlDangTin = $this->controller . '/dang-tin';
        }

        $this->render('menu');
    }

}
