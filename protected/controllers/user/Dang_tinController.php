<?php
/**
 * Hiển thị danh sách những tin đăng để khách hàng lựa chọn
 */
class Dang_tinController extends Controller {
    
    public function actionIndex(){
        $this->render('index');
    }
}