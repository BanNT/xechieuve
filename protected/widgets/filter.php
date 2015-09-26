<?php

/**
 * Hiển thị các danh sách loại xe phục vụ cho việc lọc theo loại xe
 */
class filter extends CWidget {

    public $url;

    public function init() {
        
    }

    public function run() {
        $route = explode('/', Yii::app()->controller->route);
        $controller = array_shift($route);
        if ($controller == 'xe_tim_khach') {
            $this->url = Yii::app()->request->baseUrl . '/xe_tim_khach/loc_theo_xe/';
        } else {
            $this->url = Yii::app()->request->baseUrl . '/khach_tim_xe/loc_theo_xe/';
        }


        $loaiXeGhep = Loaixeghep::model()->findAll();
        $this->render('filter', [
            'loaiXeGhep' => $loaiXeGhep
        ]);
    }

}
