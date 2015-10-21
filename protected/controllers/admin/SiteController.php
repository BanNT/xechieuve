<?php

class SiteController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (!isset(Yii::app()->user->adminName)) {
            $this->redirect(array('site/loginAdmin'));
        }
        
        $this->render('index');
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'users' => Phanquyenquantri::getALlAdminId(),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionLoginAdmin() {
        $model = new AdminLoginForm();

        if (isset($_POST['AdminLoginForm'])) {
            $model->attributes = $_POST['AdminLoginForm'];

            if ($model->validate()) {
                if ($model->login()) {
                    if (Yii::app()->user->returnUrl) {
                        $this->redirect(Yii::app()->user->returnUrl);
                        return;
                    }

                    $this->redirect(Yii::app()->homeUrl);
                }
            }
        }

        $this->renderPartial('loginAdministrator', array(
            'model' => $model
        ));
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        Yii::app()->session->clear();
        $this->redirect(array('site/loginAdmin'));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if (!isset(Yii::app()->user->adminName)) {
            $this->redirect(array('site/loginAdmin'));
        }
        
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
