<?php

class Tac_vu_khachController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'users' => Phanquyenquantri::getALlAdminByRole(Phanquyenquantri::CUSTOMER_TASK),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    
    public function actionTac_vu_khach() {
        $dangtin = new LoginForm();
        $khachhang = new Khachhang();
        $form = new CForm('application.views.admin.tac_vu_khach.form_tac_vu_khach', $khachhang);
        $khachhang->setScenario('dang_tin_khach');
        
        if ($form->submitted('dangtinkhach') && $form->validate()) {
            $id = $khachhang->idkhach;
            $id = explode("_",$id);
            $id=$id[1];
            
            if ($user = Khachhang::model()->TTkhach($id)) {
                 $dangtin->username=$user['ten_dang_nhap'];
                  $dangtin->password=$user['password']; 
               // Yii::app()->user->name = $dangtin->username;
               $dangtin->_identity=new UserIdentity($dangtin->username,$dangtin->password);
               $dangtin->_identity->authenticate();
                $dangtin->login();
               
            }
        }
        $this->render('tac_vu_khach', array(
            'form' => $form,
        ));
    }

}
