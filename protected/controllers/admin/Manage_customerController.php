<?php

/**
 * Quản lý khách hàng
 */
class Manage_customerController extends Controller {

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
            array('allow', // allow all admin have permission
                'users' => Phanquyenquantri::getALlAdminByRole(Phanquyenquantri::CUSTOMER),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
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
     * Thêm mới khách hàng
     */
    public function actionCreate() {
        $model = new Khachhang('Dang_ky');

        if (isset($_POST['Khachhang'])) {
            $model->attributes = $_POST['Khachhang'];
            if ($model->validate()) {
                $model->anh_dai_dien = Khachhang::DEFAULT_AVARTAR;
                $model->password = md5($model->password);

                //Lưu thông tin khách hàng và redirect trang
                if ($model->save(false)) {
                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->setScenario('updateSDTK');
        $model->password = $message ='';
        
        if (isset($_POST['Khachhang'])) {
            $model->attributes = $_POST['Khachhang'];
            $model->confirmPassword = $_POST['Khachhang']['confirmPassword'];
            
            if ($model->validate()) {
                if ($model->password != '') {
                    $model->password = md5($model->password);
                } else {
                    unset($model->password);
                }

                //Lưu dữ liệu vào CSDL và redirect trang
                if ($model->save(false)) {
                    $this->redirect(array('admin'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'message' => $message
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_user($id) {
        //Kiểm tra khách hàng này đã đăng tin chưa nếu chưa thì mới xóa
        if (Tinkhachhang::model()->findByAttributes(array('ma_khach_hang' => $id))) {
            $this->redirect(array('admin'));
        }

        //xóa dữ liệu khách hàng và redirect trang
        $this->loadModel($id)->delete();
        $this->redirect(array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Khachhang('search');
        $model->unsetAttributes();  // clear any default values
        if ((Yii::app()->request->getParam('Khachhang'))) {
            $model->attributes = Yii::app()->request->getParam('Khachhang');
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Khachhang the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Khachhang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Khachhang $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'khachhang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
