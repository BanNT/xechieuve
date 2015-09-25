<?php

class Dang_kiController extends Controller {

    /**
     * Đăng kí tài khoản người dùng
     */
    public function actionIndex() {
        $khachHang = new Khachhang();
        $form = new CForm('application.views.user.dang_ki.formdangki', $khachHang);
        if ($form->submitted('dangki') && $form->validate()) {
            $image = CUploadedFile::getInstance($khachHang, 'anh_dai_dien');
            if ($image) {
                $newName = md5(microtime(true) . 'xechieuve') . $image->name;
                $khachHang->anh_dai_dien = $newName;
                $image->saveAs(Khachhang::AVARTAR_DIR . $newName);
            }

            $khachHang->password = md5($khachHang->password);
            $khachHang->save(false);
            return;
        }
        
        $this->render('index', array('form' => $form));
    }

}
