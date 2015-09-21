<?php

/**
 * This class will reponsible for paginate and render paginator view
 */
class paginator extends CWidget {

    /**
     * This variable contain some info about page like current page, total page...
     * @var mixed 
     */
    public $paginator;
    public $urlPaginator;
    public $ajaxElementId;
    
    public function init() {
    }

    public function run() {
        $this->render('paginator');
    }

}
