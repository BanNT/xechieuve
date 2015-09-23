<?php
/**
 * Chủ yếu sử dụng để hiển thị danh sách khách tìm xe, hiển thị chi tiết tin
 * khách tìm xe và đăng tin khách tìm xe
 */
class Khach_tim_xeController extends Controller {
    
    /**
     * Số bản ghi khách tìm xe tối đa được hiển thị
     */
    const LIMITED_RECORD_KTX = 1;
    
    public function actionIndex($currentPage=1) {
        $tinghepxe = new Tinghepxe();
        //table khách tìm xe
        $paginatorKTX = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_RECORD_KTX, ' ma_loai_tin = ' . Tinghepxe::CODE_KTX);
        $khachtimxe = $tinghepxe->listTinGhepXeByType($paginatorKTX, Tinghepxe::CODE_KTX);

        //render view
        $data = array(
            'khachtimxe' => $khachtimxe,
            'paginatorKTX' => $paginatorKTX,
            'urlPaginatorXe' => 'khach_tim_xe/pagektx?p=',
            'ajaxElementId' => '#khachtimxe'
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else {
            $this->render('index', $data);
        }
    }
    
    public function actionPagektx(){
        $this->actionIndex($_GET['p']);
    }
    
    /**
     * Đăng tin khách tìm xe
     */
    public function actionDang_tin(){}
    
    /**
     * Hiển thị chi tiết tin khách tìm xe
     */
    public function actionChi_tiet_tin(){}
    

}
