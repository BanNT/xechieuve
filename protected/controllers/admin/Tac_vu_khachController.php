<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tac_vu_khachController extends Controller {

    private $__message;

    public function actionTac_vu_khach() {
        $dangtin = new LoginForm();
        $khachhang = new Khachhang();
        $form = new CForm('application.views.admin.tac_vu_khach.form_tac_vu_khach', $khachhang);
        $khachhang->setScenario('dang_tin_khach');
        if ($form->submitted('dangtinkhach') && $form->validate()) {
            $id = $khachhang->idkhach;
            $arry = explode("_", $id);
            $username = $arry[0];
            if (isset($arry[1])) {
                $id = $arry[1];
                if ($user = Khachhang::model()->TTkhach($id, $username)) {

                    $dangtin->username = $user['ten_dang_nhap'];
                    $dangtin->password = $user['password'];
                    $dangtin->_identity = new UserIdentity($dangtin->username, $dangtin->password);
                    $dangtin->_identity->authenticate();
                    $dangtin->login();
                    $this->redirect(Yii::app()->request->baseUrl . '/dang-tin');
                } else {
                    $this->__message = "Nhập sai id khách hàng!";
                }
            } else {
                $this->__message = "Nhập sai cú pháp!";
            }
        }
        $this->render('tac_vu_khach', array(
            'form' => $form,
            'message' => $this->__message
        ));
    }

}
