<?php
/**
 * Quản lý hiển thị bảng xe tìm khách
 */
class tinraovatWG extends CWidget {

    public $tinraovat;
    public $paginatorRV;
    public $urlPaginatorRV;
    public $ajaxElementId;

    public function init() {
        
    }

    public function run() {
        $this->render('tinraovatWG');
    }

}
