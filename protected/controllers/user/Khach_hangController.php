<?php

/**
 * Thực hiện các hoạt động của khách hàng như xem tin đã đăng hoặc chỉnh sửa tin đã đăng
 * hoặc làm mới tin đăng
 */
class Khach_hangController extends Controller {

    /**
     * Số bản ghi tối đa hiển thị tại mục tin đã đăng của khách hàng
     */
    const LIMIT_RECORD = 20;

    /**
     * Hiển thị những tin đã đăng của khách hàng dựa theo mã loại tin
     */
    public function actionTin_da_dang($maLoaiTin = null, $currentPage = 1, $message = '') {

        if (Yii::app()->user->name == 'Guest') {
            $this->redirect(Yii::app()->homeUrl . 'dang-nhap');
        }

        if (!$maLoaiTin) {
            $maLoaiTin = Yii::app()->session['maLoaiTin'] = Yii::app()->request->getParam('id');
        }

        $paginator = new Paginate($currentPage, new Tinkhachhang(), self::LIMIT_RECORD, ' ma_loai_tin = ' . $maLoaiTin);
        if ($maLoaiTin == Tinraovat::CODE_RV) {
            $tinraovat = new Tinraovat();
            $listTin = $tinraovat->listTinRV($paginator);
        } else {
            $tinghepxe = new Tinghepxe();
            $listTin = $tinghepxe->listTinGhepXeByType($paginator, $maLoaiTin);
        }

        $data = array(
            'listTin' => $listTin,
            'paginator' => $paginator,
            'message' => $message,
            'urlPaginator' => 'khach_hang/pageTDD?page=',
            'ajaxElementId' => '#tin-da-dang'
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('tin_da_dang', $data);
        } else {
            $this->render('tin_da_dang', $data);
        }
        return;
    }

    /**
     * Phân trang
     */
    public function actionPageTDD() {
        $this->actionTin_da_dang(Yii::app()->session['maLoaiTin'], Yii::app()->request->getParam('page'));
    }

    /**
     * Khách hàng làm mới tin đăng bằng cách cập nhập ngày đăng thành ngày hiện
     * tại để tin hiển thị lên trên và cũng bị trừ tiền như khi đăng tin mới
     */
    public function actionLam_moi_tin() {
        $maTin = Yii::app()->request->getParam('id');
        $message = '';
        if (!Tinkhachhang::model()->lamMoi($maTin)) {
            $message = '<span style="color:yellow">Tài khoản của bạn không đủ để làm mới tin này</span>';
        }

//Chuyển đến trang danh sách tin đã đăng
        $this->actionTin_da_dang(Yii::app()->session['maLoaiTin'], 1, $message);
    }

    /**
     * Xóa tin đăng
     */
    public function actionXoa_tin_da_dang() {
        $maTin = Yii::app()->request->getParam('id');
        Tinkhachhang::model()->deleteTin($maTin, Yii::app()->session['maLoaiTin']);
//Chuyển đến trang danh sách tin đã đăng

        $this->actionTin_da_dang(Yii::app()->session['maLoaiTin']);
    }

    /**
     * Thực hiện việc gọi sửa tin tương ứng với loại tin
     * dựa vào mã loại tin
     */
    public function actionSua_tin_dang() {
        $maTin = Yii::app()->request->getParam('id');
        if (Yii::app()->session['maLoaiTin'] == 3) {
            $this->__suaTinRaoVat($maTin);
            return;
        }

        $this->__suaTinGhepXe($maTin);
    }

    /**
     * Sửa tin rao vặt
     * @param integer $maTin
     */
    private function __suaTinRaoVat($maTin) {
        $form = new CForm('application.views.user.khach_hang._formRV');
        $form['tinkhachhang']->model = $tinKH = Tinkhachhang::model()->findByPk($maTin);
        $form['tinraovat']->model = $tinRV = Tinraovat::model()->find("ma_tin = $maTin");
        $anh = $tinRV['anh'];

        if ($form->submitted('dangtin') && $form->validate()) {
            $tinkhachhang = $form['tinkhachhang']->model;
            $tinraovat = $form['tinraovat']->model;

            if ($tinkhachhang->save(false)) {
                $image = CUploadedFile::getInstance($tinraovat, 'anh');
                if ($image) {
//Nếu tồn tại ảnh trong CSDL thì sẽ xóa ảnh cũ trong thư mục ảnh
                    if ($anh) {
                        unlink(Yii::app()->basePath . "/../" . Tinraovat::IMAGE_DIR_RV . $anh);
                    }

                    $newName = md5(microtime(true) . 'xechieuve') . $image->name;
                    $tinraovat->anh = $newName;
                    $image->saveAs(Tinraovat::IMAGE_DIR_RV . $newName);
                }

                Tinraovat::updateTinRV(
                        $tinraovat->ma_loai_tin_rv, $tinraovat->gia_rao_vat, ($tinraovat->anh != null) ? $tinraovat->anh : $anh, $tinraovat->ma_tin
                );
            }
        }

//render view
        $this->render('sua_tin', [
            'form' => $form
        ]);
    }

    /**
     * 
     * @param integer $maTin Mã tin
     */
    private function __suaTinGhepXe($maTin) {
        $form = new CForm('application.views.user.khach_hang._formGX');
        $form['tinkhachhang']->model = $tinKH = Tinkhachhang::model()->findByPk($maTin);
        $form['tinghepxe']->model = Tinghepxe::model()->find("ma_tin = $maTin");

        if ($form->submitted('dangtin') && $form->validate()) {
            $tinkhachhang = $form['tinkhachhang']->model;
            $tinghepxe = $form['tinghepxe']->model;

//update tin khách hàng sau đó là tin ghép xe
            if ($tinkhachhang->save(false)) {
                Tinghepxe::updateTinGhepXe(
                        $tinghepxe->dia_chi_di, $tinghepxe->dia_chi_den, $tinghepxe->noi_den_tinh, $tinghepxe->ma_loai_xe_ghep, $tinghepxe->ngay_khoi_hanh, $tinghepxe->ma_tin
                );
            }
        }

//render view
        $this->render('sua_tin', [
            'form' => $form
        ]);
    }

    /**
     * Đăng nhập người dùng
     */
    public function actionDang_nhap() {
        $login = new LoginForm();
        $model = new CForm('application.views.user.khach_hang._formDangNhap', $login);
        if ($model->submitted('Login') && $model->validate()) {
            $login->login();
            $this->redirect(Yii::app()->homeUrl);
        }
        $this->render('dang_nhap', array('model' => $model));
    }

    public function actionDang_xuat() {
        Yii::app()->user->logout();
        Yii::app()->session->clear();
        $this->redirect(Yii::app()->homeUrl);
    }

}
