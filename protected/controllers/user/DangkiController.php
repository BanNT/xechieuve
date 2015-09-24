<?php

class DangkiController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
     

    /**
     * Đăng kí
     */
    public function actionDangki() {
        $form = new CForm('application.views.user.dangki.formdangki');
        $form['khachhang']->model = new Khachhang();
        
        
        if ($form->submitted('dang_ki') && $form->validate()) {
            $khachhang = $form['khachhang']->model;
           
            //Nếu không đủ tiền để đăng tin sẽ không đăng
            
                    echo "đăng tin rao vặt thành công";
                    return;
                
            }
        $this->render('dangki', array('form'=>$form));
    }




	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}