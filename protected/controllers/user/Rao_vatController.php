<?php

/**
 * 
 */
class Rao_vatController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Đăng tin rao vặt
     */
    public function actionDang_tin() {
        $form = new CForm('application.views.user.rao_vat.dang_tinForm');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinraovat']->model = $tinraovat = new Tinraovat();
        
        if ($form->submitted('dangtin') && $form->validate()) {
            $tinkhachhang = $form['tinkhachhang']->model;
            $tinraovat = $form['tinraovat']->model;
            
            //Nếu không đủ tiền để đăng tin sẽ không đăng
            if($tinraovat->trutien()){
                if ($tinkhachhang->save(false)) {
                    $tinraovat->ma_tin = $tinkhachhang->ma_tin;
                    $tinraovat->save(false);
                    echo "đăng tin rao vặt thành công";
                    return;
                }
            }else{
                echo "Tài khoản của bạn không đủ tiền để đăng tin";
                return;
            }
        }
        $this->render('dang_tin', array('form'=>$form));
    }

}
