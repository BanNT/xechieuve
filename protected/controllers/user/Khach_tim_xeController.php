<?php

/**
 * Chủ yếu sử dụng để hiển thị danh sách khách tìm xe, hiển thị chi tiết tin
 * khách tìm xe và đăng tin khách tìm xe
 */
class Khach_tim_xeController extends Controller {

    /**
     * @var string
     */
    private $__message;

    /**
     * Số bản ghi khách tìm xe tối đa được hiển thị
     */
    const LIMITED_RECORD_KTX = 10;

    /**
     * Số bản ghi xe tìm khách tối đa được hiên thị ở trang đăng tin khách tìm xe
     */
    const LIMITED_REDCORD_KTXD = 1;

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
        //Chỉ chấp nhận ajax request
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
                if (!$listMaTin1 = Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, ' AND noi_den_tinh=' . $noiDen)) {
                    $condition.=' AND tinkhachhang.ma_tin=-1';
                }
            }

            //giá trị rỗng(không chọn) cho biết cần bỏ qua
            if ($ngayKhoiHanh != '') {
                //tương tự bên trên
                if (!$listMaTin2 = Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, " AND ngay_khoi_hanh='$ngayKhoiHanh'")) {
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
     * Lọc tin khách tìm xe theo loại xe
     */
    public function actionLoc_theo_xe() {
        $maLoaiXe = Yii::app()->request->getParam('id');
        //Nếu không tồn tại mã loại xe thì sẽ redirect về trang chủ
        if (!$maLoaiXe) {
            $this->redirect(Yii::app()->homeUrl);
        }

        $matins = Tinghepxe::listMaTin(Tinghepxe::CODE_KTX, ' AND ma_loai_xe_ghep= ' . $maLoaiXe);

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
     * Đăng tin khách tìm xe
     */
    public function actionDang_tin($currentPage = 1) {
        if (Yii::app()->user->name == 'Guest' || !isset(Yii::app()->user->userId)) {
            $this->redirect(Yii::app()->homeUrl . 'dang-nhap');
        }

        $tinKhachHang = new Tinkhachhang();
        $khachTimXe = new Tinghepxe();
        $noticeMessage = '';

        if (isset($_POST['submit'])) {
            $tinKhachHang->attributes = Yii::app()->request->getParam('Tinkhachhang');
            $khachTimXe->attributes = Yii::app()->request->getParam('Tinghepxe');
            //$khachTimXe->ngay_khoi_hanh = Yii::app()->request->getParam('ngay_khoi_hanh');

            if ($khachTimXe->validate() && $tinKhachHang->validate()) {
                if ($tinKhachHang->trutien(Tinghepxe::CODE_KTX)) {
                    $tinKhachHang->ma_loai_tin = Tinghepxe::CODE_KTX;
                    $tinKhachHang->ma_khach_hang = Yii::app()->user->userId;

                    if ($tinKhachHang->save(false)) {
                        $khachTimXe->ma_tin = $tinKhachHang->ma_tin;

                        $khachTimXe->save(false);
                        $this->__message = "Tin đăng của bạn đã được hiển thị tại trang khách tìm xe";
                    }
                } else {
                    $this->__message = "Tài khoản của bạn không đủ để đăng tin này";
                }
            }
        }

        $paginator = new Paginate($currentPage, $tinKhachHang, self::LIMITED_REDCORD_KTXD, ' ma_loai_tin = ' . Tinghepxe::CODE_KTX);
        $listTinKTX = $khachTimXe->listTinGhepXeByType($paginator, Tinghepxe::CODE_KTX);

        $data = array(
            'khachTimXe' => $khachTimXe,
            'tinKhachHang' => $tinKhachHang,
            'listTinKTX' => $listTinKTX,
            'paginator' => $paginator,
            'urlPaginatorKTX' => 'khach_tim_xe/pagedtxtk?page=',
            'ajaxElementId' => '#dang-tin-ktx',
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
     * Xem chi tiết tin khách tìm xe
     */
    public function actionXem_chi_tiet() {
        $maTin = Yii::app()->request->getParam('id');
        if ($maTin == '') {
            $this->redirect(Yii::app()->homeUrl);
        }

        $modelKTX = new Tinghepxe();
        if (!$tinKTX = $modelKTX->getTinGhepXe($maTin)) {
            $this->redirect(['site/index']);
        }

        $this->render('xem_chi_tiet', [
            'tinKTX' => $tinKTX
        ]);
    }

}
