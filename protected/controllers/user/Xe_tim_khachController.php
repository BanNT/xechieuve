<?php
/**
 * 
 */
class Xe_tim_khachController extends Controller {

    const LIMITED_RECORD_XTK = 1;

    public function actionIndex($currentPage=1) {

        $tinghepxe = new Tinghepxe();
        //table xe tim khach
        $paginatorXTK = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_RECORD_XTK, ' ma_loai_tin = ' . Tinghepxe::CODE_XTK);
        $xetimkhach = $tinghepxe->listTinGhepXeByType($paginatorXTK, Tinghepxe::CODE_XTK);

        //render view
        $data = array(
            'xetimkhach' => $xetimkhach,
            'paginatorXTK' => $paginatorXTK,
            'urlPaginatorKhach' => 'xe_tim_khach/pagextk?p=',
            'ajaxElementId' => '#xetimkhach'
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else {
            $this->render('index', $data);
        }
    }
    
    public function actionPagextk(){
        $this->actionIndex($_GET['p']);
    }

}
