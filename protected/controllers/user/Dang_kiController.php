<?php

class Dang_kiController extends Controller {

    /**
     * Đăng kí tài khoản người dùng
     */
    public function actionIndex() {
        $model = new Khachhang(); 
        //nó để truyền trực tiếp model vào, còn bên kia có nhiều leenphair khai báo riêng
        //nó kiểu kiểm tra xe đã submit chưa
        //bên cạnh là phương thức validate
        //khi mà validate false nó sẽ xuất hiện thông báo lỗi
        $form = new CForm('application.views.user.dang_ki.formdangki', $model);
        if ($form->submitted('dangki') && $form->validate()) {
            
        } else {
            $this->render('index', array('form' => $form)); //để chỉ cần cái localhost/xechieuve/dang_ki là vào được luôn đây
        }
    }

}
