<?php

/* class Tin_tucController extends Controller {

  /**
 * action này sẽ hiển thị danh sách tin đã đăng với các trường như tiêu đề tin, ngày đăng
 * trạng thái
 */

class Tin_tucController extends Controller {

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
                'users' => Phanquyenquantri::getALlAdminByRole(Phanquyenquantri::NEWS),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Tintuc();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tintuc'])) {

            $model->attributes = $_POST['Tintuc'];
            $image = CUploadedFile::getInstance($model, 'anh');
            $newName = md5(microtime(true) . 'xechieuve') . $image->name;
            $model->anh = $newName;
            if ($image) {
                $image->saveAs(Tintuc::AVARTAR_TINTUC . $newName);
            }
            $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
            $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/images/tintuc/uploads/"; // URL for the uploads folder
            $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../images/tintuc/uploads/"; // path to the uploads folder
            if ($model->validate()) {
                if ($model->save(false)) {

                    $this->redirect(array('view', 'id' => $model->ma_tin));
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
        $anh = $model->anh;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tintuc'])) {
            $model->attributes = $_POST['Tintuc'];
            $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
            $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/images/tintuc/uploads/"; // URL for the uploads folder
            $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../images/tintuc/uploads/"; // path to the uploads folder
            if ($model->validate()) {
                //lay ngay dang hien tai
                $model->ngay_dang= new CDbExpression('NOW()');
                $image = CUploadedFile::getInstance($model, 'anh');
                
                if ($image) {
                    if ($anh) {
                    unlink(Yii::app()->basePath .'/../'. Tintuc::AVARTAR_TINTUC . $anh);
                }
                    $newName = md5(microtime(true) . 'xechieuve') . $image->name;
                    $model->anh = $newName;
                    $image->saveAs(Tintuc::AVARTAR_TINTUC . $newName);
                } else {
                    $model->anh = $anh;
                }
                
                if ($model->save(FALSE))
                    $this->redirect(array('view', 'id' => $model->ma_tin));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_tintuc($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])){
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tintuc');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Tintuc('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Tintuc']))
            $model->attributes = $_POST['Tintuc'];

        $this->render('admin', array(
            'model' => $model,
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
