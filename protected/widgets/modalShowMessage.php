<?php
/**
 * Hiển thị thông báo
 */
class modalShowMessage extends CWidget {
    /**
     * @var string
     */
    public $message;
    
    public function init() {
        
    }

    public function run() {
        $this->render('modalShowMessage');
    }

}
