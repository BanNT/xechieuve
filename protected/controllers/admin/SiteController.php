<?php

class SiteController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','admin', 'delete','create', 'update'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
            
        );
    }

    public function actionLoginAdmin(){
        $model = new AdminLoginForm();
        
        if(isset($_POST['AdminLoginForm'])){
            $model->attributes = $_POST['AdminLoginForm'];
            if($model->validate()){
                if($model->login()){
                    
                }
            }
        }
        $this->renderPartial('loginAdministrator',array(
            'model'=>$model
        ));
    }
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
