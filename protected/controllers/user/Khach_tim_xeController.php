<?php

/**
 * Chủ yếu sử dụng để hiển thị danh sách khách tìm xe, hiển thị chi tiết tin
 * khách tìm xe và đăng tin khách tìm xe
 */
class Khach_tim_xeController extends Controller {

    /**
     * Số bản ghi khách tìm xe tối đa được hiển thị
     */
    const LIMITED_RECORD_KTX = 7;

    /**
     * Hiển thị trang index khách tìm xe
     * @param integer $currentPage
     * @param string $condition 
     * @param boolean $callDirectly Nếu giá trị là true thì có nghĩa là action index được gọi trực tiếp qua URL
     */
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

    /**
     * Nhận số trang để phân trang
     */
    public function actionPagektx() {
        $condition = isset(Yii::app()->session['condition']) ? Yii::app()->session['condition'] : null;
        $this->actionIndex($_GET['p'], $condition, false);
    }

    /**
     * Tìm kiếm khách dựa theo nơi di, nới đến, ngày khởi hành
     */
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
        $this->actionIndex(null, $condition, false);
    }

    /**
     * Lọc tin khách tìm xe theo loại xe
     */
    public function actionLoc_theo_xe() {
        $maLoaiXe = $_GET['id'];
        $matins = Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, ' AND ma_loai_xe_ghep= ' . $maLoaiXe);

        $ma = '(';
        foreach ($matins as $matin) {
            $ma.=$matin['ma_tin'] . ',';
        }
        $ma .= '0)';
        $condition = " AND tinkhachhang.ma_tin IN $ma";
        $this->actionIndex(null, $condition, false);
    }

    /**
     * Đăng tin khách tìm xe
     */
    public function actionDang_tin() {
        $form = new CForm('application.views.user.khach_tim_xe.dang_tinForm');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinghepxe']->model = $tinghepxe = new Tinghepxe();
        $noticeMessage = '';

        if ($form->submitted('dangtin') && $form->validate()) {

            $tinkhachhang = $form['tinkhachhang']->model;
            $tinghepxe = $form['tinghepxe']->model;

            if ($tinkhachhang->trutien(Tinghepxe::CODE_KTX)) {
                $tinkhachhang->ma_loai_tin = Tinghepxe::CODE_KTX;
                if ($tinkhachhang->save(false)) {
                    $tinghepxe->ma_tin = $tinkhachhang->ma_tin;
                    $tinghepxe->save(false);
                    $noticeMessage = "<h4 style='color:green'>Tin đăng của bạn đã được hiển thị tại trang rao vặt<h4>";
                }
            } else {
                $noticeMessage = "<h4 style='color:red'>Tài khoản của bạn không đủ để đăng tin</h4>";
            }
        }

        $data = array(
            'form' => $form
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('dang_tin', $data);
        } else {
            $this->render('dang_tin', $data);
        }
    }

    /**
     * Xem chi tiết tin khách tìm xe
     */
    public function actionXem_chi_tiet() {
        $id = $_GET['id'];
//        die('hello world');
        $modelKTX = new Tinghepxe();
        if (!$tinKTX = $modelKTX->getTinGhepXe(Tinghepxe::CODE_KTX, $id)) {
            $this->redirect(['site/index']);
        }
        var_dump($tinKTX);die;
        $this->render('xem_chi_tiet',[
            'tinKTX'=>$tinKTX
        ]);
        
    }

}
