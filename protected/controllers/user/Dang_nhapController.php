<?php
class Dang_nhapController extends Controller
{
     public function actionIndex() {
        $login = new LoginForm();
        $model = new CForm('application.views.user.dang_nhap.formdangnhap', $login);
        if ($model->submitted('Login') && $model->validate()) {
            //$this->redirect(Yii::app()->homeUrl);
                //Yii::app()->user->isGuest;
             
            $login->login();  
          
               $this->redirect(Yii::app()->homeUrl);
        }
        $this->render('index', array('model' => $model));
    }
    
  
}

