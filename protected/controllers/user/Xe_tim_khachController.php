<?php

/**
 * Thực hiện các hành động của người dùng với danh sách xe tìm khách
 */
class Xe_tim_khachController extends Controller {

    /**
     * @var string
     */
    private $__message;

    const LIMITED_RECORD_XTK = 10;

    /**
     * Số bản ghi xe tìm khách tối đa được hiên thị ở trang đăng tin xe tìm khách
     */
    const LIMITED_REDCORD_XTKD = 1;

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
            'urlPaginatorKhach' => 'xe_tim_khach/pagextk?page=',
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
        $this->actionIndex(Yii::app()->request->getParam('page'), $condition, false);
    }

    /**
     * Tìm kiếm khách dựa theo các tiêu chí nơi đi, nơi đến, ngày khởi hành
     */
    public function actionTim_kiem_xe() {
        if (Yii::app()->request->isAjaxRequest) {
            $condition = $listMaTin = $listMaTin1 = $listMaTin2 = '';
            $noiDi = Yii::app()->request->getParam('noi-di');
            $noiDen = Yii::app()->request->getParam('noi-den');
            $ngayKhoiHanh = Yii::app()->request->getParam('ngay-khoi-hanh');

            //-1(không chọn) và 0(chọn toàn quốc) là 2 giá trị cho biết cần bỏ qua
            $condition .= (isset($noiDi) && $noiDi != -1 && $noiDi != 0) ?
                    " AND tinh_thanh=" . $noiDi : '';

            if ($noiDen != -1 && $noiDen != 0) {
                //Nếu không lấy được ra danh sách mã tin thì sẽ đặt điều kiện cho kết quả không thể được tìm thấy
                if (!$listMaTin1 = Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, ' AND noi_den_tinh=' . $noiDen)) {
                    $condition.=' AND tinkhachhang.ma_tin=-1';
                }
            }

            //giá trị rỗng(không chọn) cho biết cần bỏ qua
            if ($ngayKhoiHanh != '') {
                //tương tự bên trên
                if (!$listMaTin2 = Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, " AND ngay_khoi_hanh='$ngayKhoiHanh'")) {
                    $condition.=' AND tinkhachhang.ma_tin=-1';
                }
            }

            if (($listMaTin1) && ( $listMaTin2)) {//Tìm ra mã tin giống nhau giữa 2 danh sách mã tin để cho vào $listMaTin
                foreach ($listMaTin1 as $matin1) {
                    foreach ($listMaTin2 as $matin2) {
                        if ($matin1['ma_tin'] == $matin2['ma_tin']) {
                            $listMaTin.=$matin1['ma_tin'] . ',';
                        }
                    }
                }
            } elseif ($listMaTin1) {//Nếu chỉ có 1 danh sách mã tin thì cho luôn vào $listMaTin
                foreach ($listMaTin1 as $matin1) {
                    $listMaTin.=$matin1['ma_tin'] . ',';
                }
            } elseif ($listMaTin2) {//Nếu chỉ có 1 danh sách mã tin thì cho luôn vào $listMaTin
                foreach ($listMaTin2 as $matin2) {
                    $listMaTin.=$matin2['ma_tin'] . ',';
                }
            }

            //xác định điều kiện để gửi cho action index va lưu lại vào session để phân trang
            $condition .= ($listMaTin != '') ? ' AND tinkhachhang.ma_tin IN (' . $listMaTin . '0)' : '';
            Yii::app()->session['condition'] = $condition;

            $this->actionIndex(null, $condition, false);
        }
    }

    /**
     * Lọc tin xe tìm khách theo loại xe ghép
     */
    public function actionLoc_theo_xe() {
        $maLoaiXe = Yii::app()->request->getParam('id');
        $matins = Tinghepxe::listMaTin(Tinghepxe::CODE_XTK, ' AND ma_loai_xe_ghep= ' . $maLoaiXe);

        $ma = '(';
        foreach ($matins as $matin) {
            $ma.=$matin['ma_tin'] . ',';
        }
        $ma .= '0)';
        $condition = " AND tinkhachhang.ma_tin IN $ma";
        Yii::app()->session['condition'] = $condition;
        $this->actionIndex(null, $condition, false);
    }

    /**
     * Đăng tin xe tìm khách
     */
    public function actionDang_tin($currentPage = 1) {
        if (Yii::app()->user->name == 'Guest' || !isset(Yii::app()->user->userId)) {
            $this->redirect(Yii::app()->homeUrl . 'dang-nhap');
        }

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
                    $this->__message = "Tin đăng của bạn đã được hiển thị tại trang xe tìm khách";
                }
            } else {
                $this->__message = "Tài khoản của bạn không đủ để đăng tin";
            }
        }

        $tinghepxe = new Tinghepxe();
        $paginator = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_REDCORD_XTKD, ' ma_loai_tin = ' . Tinghepxe::CODE_XTK);
        $listTinXTK = $tinghepxe->listTinGhepXeByType($paginator, Tinghepxe::CODE_XTK);

        $data = array(
            'form' => $form,
            'listTinXTK' => $listTinXTK,
            'paginator' => $paginator,
            'urlPaginatorXTK' => 'xe_tim_khach/pagedtxtk?page=',
            'ajaxElementId' => '#dang-tin-xtk',
            'message' => $this->__message
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('dang_tin', $data);
        } else {
            $this->render('dang_tin', $data);
        }
    }

    public function actionPagedtxtk() {
        $this->actionDang_tin(Yii::app()->request->getParam('page'));
    }

    /**
     * Xem chi tiết tin Xe tìm khách
     */
    public function actionXem_chi_tiet($condition = null) {
        $maTin = Yii::app()->request->getParam('id');
        $modelXTK = new Tinghepxe();
        if (!$tinXTK = $modelXTK->getTinGhepXe($maTin)) {
            $this->redirect(['site/index']);
        }

        $this->render('xem_chi_tiet', [
            'tinXTK' => $tinXTK
        ]);
    }

}
