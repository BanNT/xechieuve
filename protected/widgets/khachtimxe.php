<?php

/**
 * display khachtimxe
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
