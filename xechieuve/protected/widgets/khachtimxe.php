<?php

/**
 * Quản lý hiển thị bảng khách tìm xe
 */
class khachtimxe extends CWidget {

    public $khachtimxe;
    public $paginatorXe;
    public $urlPaginatorXe;
    public $ajaxElementId;

    public function init() {
        
    }

    public function run() {
        $this->render('khachtimxe');

    }

}
