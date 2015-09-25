<?php

/**
 * 
 */
class Xe_tim_khachController extends Controller {

    const LIMITED_RECORD_XTK = 2;

    /**
     * @param integer $currentPage
     * @param string $condition Điều kiện thêm vào
     * @param boolean $callDirectly
    public function actionIndex($currentPage = 1
     */
    public function actionIndex($currentPage = 1, $condition = null, $callDirectly = true) {
        if ($callDirectly) {
            Yii::app()->session['condition'] = null;
        }

        $tinghepxe = new Tinghepxe();
        //table xe tim khach
        $paginatorXTK = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_RECORD_XTK, ' ma_loai_tin = ' . Tinghepxe::CODE_XTK . $condition);
        $xetimkhach = $tinghepxe->listTinGhepXeByType($paginatorXTK, Tinghepxe::CODE_XTK, $condition);
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

    public function actionPagextk() {
        $condition = isset(Yii::app()->session['condition']) ? Yii::app()->session['condition'] : null;
        $this->actionIndex($_GET['p'], $condition, false);
    }

    /**
     * Tìm kiếm khách dựa theo các tiêu chí nơi đi, nơi đến, ngày khởi hành
     */
    public function actionTim_kiem_xe() {
        if($_SERVER['REQUEST_METHOD']!='POST'){
            $this->actionIndex();
        }
        
        $condition = $listMaTin ='';
        $condition .= (isset($_POST['noi-di']) && $_POST['noi-di'] != -1 && $_POST['noi-di'] != 0) ?
                " AND tinh_thanh=" . (int) $_POST['noi-di'] : '';
        $listMaTin1 = ($_POST['noi-den']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, ' AND noi_den_tinh=' . $_POST['noi-den']) : null;
        $listMaTin2 = ($ngayKH = $_POST['ngay-khoi-hanh']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, " AND ngay_khoi_hanh='$ngayKH'") : null;

        if (($listMaTin1) AND ( $listMaTin2)) {
            foreach ($listMaTin1 as $matin1) {
                foreach ($listMaTin2 as $matin2) {
                    if ($matin1['ma_tin'] == $matin2['ma_tin']) {
                        $listMaTin.=$matin1['ma_tin'] . ',';
                    }
                }
            }
        } elseif ($listMaTin1) {
            foreach ($listMaTin1 as $matin1) {
                $listMaTin.=$matin1['ma_tin'] . ',';
            }
        } elseif ($listMaTin2) {
            foreach ($listMaTin2 as $matin2) {
                $listMaTin.=$matin2['ma_tin'] . ',';
            }
        }

        $condition .= ($listMaTin != '') ? ' AND tinkhachhang.ma_tin IN (' . $listMaTin . '0)' : '';
        Yii::app()->session['condition'] = $condition;

        $this->actionIndex(null, $condition, false);
    }

}
