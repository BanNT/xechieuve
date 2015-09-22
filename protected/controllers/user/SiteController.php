<?php

class SiteController extends Controller {
//
//    /**
//     * Declares class-based actions.
//     */
//    public function actions() {
//        return array(
//            // captcha action renders the CAPTCHA image displayed on the contact page
//            'captcha' => array(
//                'class' => 'CCaptchaAction',
//                'backColor' => 0xFFFFFF,
//            ),
//            // page action renders "static" pages stored under 'protected/views/site/pages'
//            // They can be accessed via: index.php?r=site/page&view=FileName
//            'page' => array(
//                'class' => 'CViewAction',
//            ),
//        );
//    }

    /**
     * This is the default 'index' action that is invoked
     * By defaul i will display the list of tinghepxe table
     */
    public function actionIndex($currentPageXe = null, $currentPageKhach = null, $call = false) {
//        die('hello world');
//        if (!$call) {
//            $app = Yii::app();
//            $app->session['currentPageXeAtHome'] = 1;
//            $app->session['currentPageKhachAtHome'] = 1;
//        }
//        $table = new Tinghepxe();
//
//        //table xe tim khach
//        $paginatorXe = new Paginate($currentPageXe, $table, 3, ' ma_loai_tin = 3');
//        $limit = $paginatorXe->limitSQl();
//        $sql = "SELECT * FROM tinghepxe WHERE ma_loai_tin = 3" . $limit;
//        $khachtimxe = $table->findAllBySql($sql);
//
//        //table khach tim xe
//        $paginatorKhach = new Paginate($currentPageKhach, $table, 3);
//        $limit = $paginatorKhach->limitSQl();
//        $sql = "SELECT * FROM tinghepxe " . $limit;
//        $xetimkhach = $table->findAllBySql($sql);
//
//        //render view
//        $data = array(
//            'khachtimxe' => $khachtimxe,
//            'paginatorXe' => $paginatorXe,
//            'urlPaginatorXe' => 'site/pagexe?p=',
//            'xetimkhach' => $xetimkhach,
//            'paginatorKhach' => $paginatorKhach,
//            'urlPaginatorKhach' => 'site/pagekhach?p=',
//            'ajaxElementId' => '#indexPage'
//        );
//
//        if (Yii::app()->request->isAjaxRequest) {
//            $this->renderPartial('index', $data);
//        } else {
            $this->render('index');
//        }
    }

    /**
     * paginate khachtimxe table at home page
     */
    public function actionPagexe() {
        $app = Yii::app();
        $app->session['currentPageXeAtHome'] = $_GET['p'];
        $app->session['currentPageKhachAtHome'] = isset($app->session['currentPageKhachAtHome']) ? $app->session['currentPageKhachAtHome'] : 1;
        $this->actionIndex($app->session['currentPageXeAtHome'], $app->session['currentPageKhachAtHome'],true);
    }

    /**
     * paginate xetimkhach table at home page
     */
    public function actionPagekhach() {
        $app = Yii::app();
        $currentPageXeAtHome = $app->session['currentPageXeAtHome'] = isset($app->session['currentPageXeAtHome']) ? $app->session['currentPageXeAtHome'] : 1;
        $currentPageKhachAtHome = $app->session['currentPageKhachAtHome'] = $_GET['p'];
        $this->actionIndex($currentPageXeAtHome, $currentPageKhachAtHome,true);
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

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
