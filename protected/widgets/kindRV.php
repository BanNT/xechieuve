<?php

/**
 * This class will reponsible for paginate and render paginator view
 */
class kindRV extends CWidget {

    public function init() {
        
    }

    public function run() {
        $loaiTinRV = Loaitinraovat::model()->findAll();
        $this->render('kindRV', array(
            'loaiTinRV' => $loaiTinRV
        ));
    }

}
