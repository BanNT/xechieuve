<?php
/**
 * Quản lý hiển thị bảng xe tìm khách
 */
class xetimkhach extends CWidget {

    public $xetimkhach;
    public $paginatorKhach;
    public $urlPaginatorKhach;
    public $ajaxElementId;

    public function init() {
        
    }

    public function run() {
        $this->render('xetimkhach');
    }

}
