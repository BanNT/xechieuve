<?php

/*class Tin_tucController extends Controller {

    /**
     * action này sẽ hiển thị danh sách tin đã đăng với các trường như tiêu đề tin, ngày đăng
     * trạng thái
     */
       /**
 public function actionIndex() {
        $tintuc = Yii::app()->db->createCommand()
                ->select('ma_tin,tieu_de,noi_dung,anh,date(ngay_dang) as ngay_dang, tom_tat,trang_thai')
                ->from('tintuc')
                ->order('ngay_dang DESC')
                ->queryAll();
        $data = array(
            'tintuc' => $tintuc,
        );
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else if (isset($_GET['action'])) {
            $id = $_GET['action'];
            if ($id != NULL) {
                echo"id la:" . $id;
            }
            $this->renderPartial('update');
        } else {
            $this->render('index', $data);
        }
    }

    /**
     * action này thực hiện việc sửa tin
     */
   /* public function actionSua_tin_dang() {
        $id = $_GET['action'];
        if ($id != NULL) {
            echo"id la:" . $id;
        }
        $this->render('update');
    }

    /**
     * xóa tin tức
     */
   /* public function actionXoa_tin_dang() {
        
    }

    /**
     * action này sẽ thực hiện việc đăng tin, tạm thời bà cứ làm phần này trước.
     * Cách tạo form thế nào thì tham khảo mấy cái bên user ấy rồi tạo
     */
   /* public function actionDang_tin() {
        
    }

}*/
class Tin_tucController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
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
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','delete'),
                'users'=>array('*'),
            ),
           /* array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),*/
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Tintuc;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Tintuc']))
        {
            $model->attributes=$_POST['Tintuc'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->ma_tin));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Tintuc']))
        {
            $model->attributes=$_POST['Tintuc'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->ma_tin));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Tintuc');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Tintuc('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Tintuc']))
            $model->attributes=$_GET['Tintuc'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Tintuc the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Tintuc::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Tintuc $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='tintuc-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
} 
