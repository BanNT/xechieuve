<?php

/**
 * Thực hiện các hành động của người dùng với danh sách xe tìm khách
 */
class Xe_tim_khachController extends Controller {

    const LIMITED_RECORD_XTK = 10;

    /**
     * @param integer $currentPage
     * @param string $condition Điều kiện thêm vào
     * @param boolean $callDirectly
      public function actionIndex($currentPage = 1
     */
    public function actionIndex($currentPage = null, $condition = null, $callDirectly = true) {
        //Nếu action index được gọi trực tiếp thì sẽ xóa session condition
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
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->actionIndex();
        }

        $condition = $listMaTin = '';
        $condition .= (isset($_POST['noi-di']) && $_POST['noi-di'] != -1 && $_POST['noi-di'] != 0) ?
                " AND tinh_thanh=" . $_POST['noi-di'] : '';
        $listMaTin1 = ($_POST['noi-den']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, ' AND noi_den_tinh=' . $_POST['noi-den']) : null;
        $listMaTin2 = ($ngayKH = $_POST['ngay-khoi-hanh']) ?
                Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, " AND ngay_khoi_hanh='$ngayKH'") : null;

        if (($listMaTin1) && ( $listMaTin2)) {
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
     * Lọc tin xe tìm khách theo loại xe ghép
     */
    public function actionLoc_theo_xe() {
        $maLoaiXe = $_GET['id'];
        $matins = Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, ' AND ma_loai_xe_ghep= ' . $maLoaiXe);

        $ma = '(';
        foreach ($matins as $matin) {
            $ma.=$matin['ma_tin'] . ',';
        }
        $ma .= '0)';
        $condition = " AND tinkhachhang.ma_tin IN $ma";
        $this->actionIndex(null, $condition, false);
    }

    /**
     * Đăng tin xe tìm khách
     */
    public function actionDang_tin() {
        $form = new CForm('application.views.user.xe_tim_khach.dang_tinForm');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinghepxe']->model = $tinghepxe = new Tinghepxe();
        $noticeMessage = '';
        
        if ($form->submitted('dangtin') && $form->validate()) {

            $tinkhachhang = $form['tinkhachhang']->model;
            $tinghepxe = $form['tinghepxe']->model;

            if ($tinkhachhang->trutien(Tinghepxe::CODE_XTK)) {
                $tinkhachhang->ma_loai_tin = Tinghepxe::CODE_XTK;
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

}
