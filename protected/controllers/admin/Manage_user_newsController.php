<?php

class Manage_user_newsController extends Controller {

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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','create', 'update'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Tinkhachhang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tinkhachhang'])) {
            $model->attributes = $_POST['Tinkhachhang'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ma_tin));
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
    public function actionUpdate($id, $type) {
        $tinKhachHang = $this->loadModel($id);
        if ($tinKhachHang->ma_loai_tin == Tinraovat::CODE_RV) {
            $this->_updateTinRaoVat($tinKhachHang);
            return;
        }
        
        $this->_updateTinGhepXe($tinKhachHang);
    }

    /**
     * Update tin rao vặt
     * @param Tinkhachhang $tinKhachHang
     */
    private function _updateTinRaoVat($tinKhachHang) {
        $tinRaoVat = Tinraovat::model()->findByAttributes(array(
            'ma_tin' => $tinKhachHang->ma_tin
        ));
        
        if (isset($_POST['Tinkhachhang'])) {
            $anh = $tinRaoVat->anh;
            $tinKhachHang->attributes = $_POST['Tinkhachhang'];
            $tinRaoVat->attributes = $_POST['Tinraovat'];

            if ($tinKhachHang->validate() AND $tinRaoVat->validate()) {
                //Lưu dữ liệu vào CSDL và redirect trang
                $tinKhachHang->save(false);

                Tinraovat::updateTinRV(
                        $tinRaoVat->ma_loai_tin_rv, $tinRaoVat->gia_rao_vat, $tinRaoVat->anh, $tinRaoVat->ma_tin
                );
                $this->redirect(array('admin'));
            }
        }

        $this->render('updateTinRaoVat', array(
            'tinKhachHang' => $tinKhachHang,
            'tinRaoVat' => $tinRaoVat
        ));
    }

    /**
     * 
     * @param Tinkhachhang $tinKhachHang
     */
    private function _updateTinGhepXe($tinKhachHang) {
        $tinGhepXe = Tinghepxe::model()->findByAttributes(array(
            'ma_tin' => $tinKhachHang->ma_tin
        ));
        
        if (isset($_POST['Tinkhachhang'])) {
            $tinKhachHang->attributes = $_POST['Tinkhachhang'];
            $tinGhepXe->attributes = $_POST['Tinghepxe'];

            if ($tinKhachHang->validate() AND $tinGhepXe->validate()) {
                //Lưu dữ liệu vào CSDL và redirect trang
                $tinKhachHang->save(false);
                Tinghepxe::updateTinGhepXe(
                        $tinGhepXe->dia_chi_di,
                        $tinGhepXe->dia_chi_den,
                        $tinGhepXe->noi_den_tinh,
                        $tinGhepXe->ma_loai_xe_ghep,
                        $tinGhepXe->ngay_khoi_hanh,
                        $tinGhepXe->ma_tin
                );
                $this->redirect(array('admin'));
            }
        }
        
        $this->render('updateTinGhepXe', array(
            'tinKhachHang' => $tinKhachHang,
            'tinGhepXe' => $tinGhepXe
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_user_news($id,$type) {
        //xóa dữ liệu tin đăng khách hàng và redirect trang
        $tinKhachHang = $this->loadModel($id);
        if($tinKhachHang->ma_loai_tin == Tinraovat::CODE_RV){
            Tinraovat::model()->deleteAll('ma_tin ='.$tinKhachHang->ma_tin);
        }else{
            Tinghepxe::model()->deleteAll('ma_tin ='.$tinKhachHang->ma_tin);
        }
        
        $tinKhachHang->delete();
        $this->redirect(array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Tinkhachhang');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Tinkhachhang('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Tinkhachhang']))
            $model->attributes = $_GET['Tinkhachhang'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tinkhachhang the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Tinkhachhang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Tinkhachhang $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tinkhachhang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
