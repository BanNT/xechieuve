<?php
/**
 * Hiển thị danh sách những tin đăng để khách hàng lựa chọn
 */
class Dang_tinController extends Controller {
    
    public function actionIndex(){
        if(Yii::app()->user->name!=='Guest')
        {
        $this->render('index');
        }
        else
        {
            $a=Yii::app()->request->baseUrl;
        echo"Bạn cần <a href='".CHtml::encode(Yii::app()->request->baseUrl)."/dang_nhap'>đăng nhập</a> mới có thể đăng tin";
        }
    }
}