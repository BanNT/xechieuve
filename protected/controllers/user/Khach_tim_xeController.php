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

    public function actionIndex($currentPage = null, $condition = null, $callDirectly = true) {
        if ($callDirectly) {
            Yii::app()->session['condition'] = null;
        }

        $tinghepxe = new Tinghepxe();
        //table khách tìm xe
        $paginatorKTX = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_RECORD_KTX, ' ma_loai_tin = ' . Tinghepxe::CODE_KTX . $condition);
        $khachtimxe = $tinghepxe->listTinGhepXeByType($paginatorKTX, Tinghepxe::CODE_KTX, $condition);

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

    public function actionPagektx() {
        $condition = isset(Yii::app()->session['condition']) ? Yii::app()->session['condition'] : null;
        $this->actionIndex($_GET['p'], $condition, false);
    }

    public function actionTim_kiem_khach() {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->actionIndex();
        }

        $condition = $listMaTin = '';
        $condition .= (isset($_POST['noi-di']) && $_POST['noi-di'] != -1 && $_POST['noi-di'] != 0) ?
                " AND tinh_thanh=" . (int) $_POST['noi-di'] : '';
        $listMaTin1 = ($_POST['noi-den']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, ' AND noi_den_tinh=' . $_POST['noi-den']) : null;
        $listMaTin2 = ($ngayKH = $_POST['ngay-khoi-hanh']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, " AND ngay_khoi_hanh='$ngayKH'") : null;

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
//        echo "<pre>";
//        var_dump($listMaTin1);
//        var_dump($listMaTin2);
//        var_dump($condition);
//        echo "</pre>";
//        die;
        $this->actionIndex(null, $condition, false);
    }

}
