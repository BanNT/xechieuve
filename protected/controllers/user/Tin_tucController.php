<?php

class Tin_tucController extends Controller {

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
    public function actionXem_chi_tiet() {
        $matin = Yii::app()->request->getParam('id');
        $this->render('Xem_chi_tiet', array(
            'model' => $this->loadModel($matin),
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tintuc', array(
            'criteria' => array(
                'condition' => 'trang_thai=1',
                'order' => 'ngay_dang DESC',
            ),
            'countCriteria' => array(
                'condition' => 'trang_thai=1',
            ),
            'pagination' => [
                'pageSize' => 5,
            ],));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tintuc the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Tintuc::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Tintuc $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tintuc-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
