<?php

class Tin_tucController extends Controller {

    public function actionIndex() {

        $tintuc = Yii::app()->db->createCommand()
                ->select('ma_tin,tieu_de,noi_dung,anh,ngay_dang, tom_tat')
                ->from('tintuc')
                ->order('ngay_dang DESC')
                ->queryAll();
        $data = array(
            'tintuc' => $tintuc,
        );
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else {
            $this->render('index', $data);
        }
    }

    public function actionXem_chi_tiet() {
        $matin = Yii::app()->request->getParam('id');
        $tintuc =Yii::app()->db->createCommand()
                        ->select('ma_tin ,ngay_dang, tieu_de ,noi_dung,anh,tom_tat')
                        ->from('tintuc')
                        ->where("ma_tin=$matin")
                        ->queryRow();
        if (!$tintuc) {
            $this->redirect(['site/index']);
        }

        $this->render('xem_chi_tiet', [
            'tintuc' => $tintuc
        ]);
    }

}
