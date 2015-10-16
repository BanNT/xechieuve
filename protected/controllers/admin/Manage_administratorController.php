<?php

class Manage_administratorController extends Controller {

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
//            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $quanTriVien = new Quantrivien('create');

        if (isset($_POST['Quantrivien'])) {
            $quanTriVien->attributes = $_POST['Quantrivien'];

            if ($quanTriVien->validate()) {
                $quanTriVien->password = md5($quanTriVien->password . md5($quanTriVien->password . 'xeghephang'));

                if ($quanTriVien->save(false)) {
                    $id = $quanTriVien->ma_qtv;

                    $roles = isset($_POST['role']) ? $_POST['role'] : '';
                    if ($roles) {
                        foreach ($roles as $role) {
                            $phanQuyen = new Phanquyenquantri();
                            $phanQuyen->ma_quyen = $role;
                            $phanQuyen->ma_qtv = $id;
                            $phanQuyen->save(false);
                        }
                    }

                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('create', array(
            'model' => $quanTriVien,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $quanTriVien = $this->loadModel($id);
        $PhanQuyen = Phanquyenquantri::model()->getAllAuthorizationById($quanTriVien->ma_qtv);

        $quanTriVien->setScenario('update');
        $quanTriVien->password = '';

        if (isset($_POST['Quantrivien'])) {
            $quanTriVien->attributes = $_POST['Quantrivien'];
            $quanTriVien->confirmPassword = $_POST['Quantrivien']['confirmPassword'];

            if ($quanTriVien->validate()) {
                if ($quanTriVien->password != '') {
                    $quanTriVien->password = md5($quanTriVien->password . md5($quanTriVien->password . 'xeghephang'));
                } else {
                    unset($quanTriVien->password);
                }

                if ($quanTriVien->save(false)) {
                    //xóa quyền cũ
                    Phanquyenquantri::model()->deleteAllByAttributes(array('ma_qtv' => $quanTriVien->ma_qtv));

                    $roles = isset($_POST['role']) ? $_POST['role'] : '';
                    if ($roles) {
                        foreach ($roles as $role) {
                            $phanQuyen = new Phanquyenquantri();
                            $phanQuyen->ma_quyen = $role;
                            $phanQuyen->ma_qtv = $id;
                            $phanQuyen->save(false);
                        }
                    }
                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('update', array(
            'model' => $quanTriVien,
            'phanQuyen' => $PhanQuyen
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        Phanquyenquantri::model()->deleteAllByAttributes(array('ma_qtv' => $id));
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Quantrivien');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Quantrivien('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Quantrivien']))
            $model->attributes = $_GET['Quantrivien'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Quantrivien the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Quantrivien::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Quantrivien $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'quantrivien-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
