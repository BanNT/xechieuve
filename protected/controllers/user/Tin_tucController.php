<?php

class Tin_tucController extends Controller {

    public function actionIndex() {

        $modelTT = new Tintuc();
        $tintuc=$modelTT->getTintuc($id=null);
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
        $modelTT= new Tintuc();
        $tintuc = $modelTT->getChitietTT($matin);
        if($matin == ''){
            $this->redirect(Yii::app()->homeUrl);
        }
        if (!$tintuc) {
            $this->redirect(['site/index']);
        }

        $this->render('xem_chi_tiet', [
            'tintuc' => $tintuc
        ]);
    }

}
