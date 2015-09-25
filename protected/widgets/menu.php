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
    public $urlDangTin = 'dang_tin';

    /**
     * Danh sách những loại tin khách hàng có thể đăng
     * @var array
     */
    private $__tinDang = [
        'xe_tim_khach',
        'khach_tim_xe',
        'rao_vat'
    ];

    public function init() {
        
    }

    public function run() {
        $route = explode('/', Yii::app()->controller->route);
        $this->controller = array_shift($route);

        //Nếu controller có trong $__tinDang thì dang_tin sẽ là action của
        //controller đó
        if (in_array($this->controller, $this->__tinDang)) {
            $this->urlDangTin = $this->controller . '/dang_tin';
        }

        $this->render('menu');
    }

}
