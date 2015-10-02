<?php
class DangxuatController extends Controller
{

 public function actionDangxuat() 
    {
       /* Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);*/
        Yii::app()->user->logout();
        Yii::app()->session->clear();
        $this->redirect(Yii::app()->homeUrl);
    }
}

