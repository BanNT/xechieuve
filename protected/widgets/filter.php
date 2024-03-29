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
        if ($controller == 'xe-tim-khach') {
            $this->url = Yii::app()->request->baseUrl . '/xe-tim-khach/loc-theo-xe/';
        } else {
            $this->url = Yii::app()->request->baseUrl . '/khach-tim-xe/loc-theo-xe/';
        }


        $loaiXeGhep = Loaixeghep::model()->findAll();
        $this->render('filter', array(
            'loaiXeGhep' => $loaiXeGhep
        ));
    }

}
