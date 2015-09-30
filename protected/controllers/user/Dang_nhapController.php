<?php
class Dang_nhapController extends Controller
{
     public function actionIndex() {
        $khachHang = new Khachhang();
        $form = new CForm('application.views.user.dang_nhap.formdangnhap', $khachHang);
        $this->render('index', array('form' => $form));
    }
}

