<?php

/**
 * 
 */
class Rao_vatController extends Controller {

    /**
     * Số bản ghi rao vặt tối đa được hiển thị ở trang index
     */
    const LIMITED_RECORD_RVI = 10;

    /**
     * Số bản ghi rao vặt tối đa được hiên thị ở trang đăng tin rao vặt
     */
    const LIMITED_REDCORD_RV = 3;

    /**
     * Hiển thị danh sách tin rao vặt
     * @param integer $currentPage
     */
    public function actionIndex($currentPage = null, $limit = self::LIMITED_RECORD_RVI, $condition = null, $callDirectly = true) {
        if ($callDirectly) {
            Yii::app()->session['condition'] = null;
        }

        $tinraovat = new Tinraovat();
        $paginatorRV = new Paginate($currentPage, new Tinkhachhang(), $limit, ' ma_loai_tin = ' . Tinraovat::CODE_RV . $condition);
        $listTinRV = $tinraovat->listTinRV($paginatorRV, $condition);



        //render view
        $data = array(
            'listTinRV' => $listTinRV,
            'paginatorRV' => $paginatorRV,
            'urlPaginatorRV' => 'rao_vat/pagerv?page=',
            'ajaxElementId' => '#table-rv'
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else {
            $this->render('index', $data);
        }
    }

    /**
     * nhận số trang để thực hiện phân trang
     */
    public function actionPagerv() {
        $condition = isset(Yii::app()->session['condition']) ? Yii::app()->session['condition'] : null;
        $this->actionIndex(Yii::app()->request->getParam('page'), self::LIMITED_RECORD_RVI, $condition, false);
    }

    /**
     * Đăng tin rao vặt
     */
    public function actionDang_tin($currentPage = 1) {
        if (Yii::app()->user->name == 'Guest') {
            $this->redirect(Yii::app()->homeUrl . 'dang-nhap');
        }

        $form = new CForm('application.views.user.rao_vat._form');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinraovat']->model = $tinraovat = new Tinraovat();
        $form->title = 'Đăng tin rao vặt:';
        $noticeMessage = '';

        if ($form->submitted('dangtin') && $form->validate()) {
            $tinkhachhang = $form['tinkhachhang']->model;
            $tinraovat = $form['tinraovat']->model;

            //Nếu không đủ tiền để đăng tin sẽ không đăng
            if ($tinkhachhang->trutien(Tinraovat::CODE_RV)) {
                $tinkhachhang->ma_loai_tin = Tinraovat::CODE_RV;
                if ($tinkhachhang->save(false)) {
                    $image = CUploadedFile::getInstance($tinraovat, 'anh');
                    if ($image) {
                        $newName = md5(microtime(true) . 'xechieuve') . $image->name;
                        $tinraovat->anh = $newName;
                        $image->saveAs(Tinraovat::IMAGE_DIR_RV . $newName);
                    }

                    $tinraovat->ma_tin = $tinkhachhang->ma_tin;
                    $tinraovat->save(false);
                    $noticeMessage = "<h4 style='color:green'>Tin đăng của bạn đã được hiển thị tại trang rao vặt<h4>";
                }
            } else {
                $noticeMessage = "<h4 style='color:red'>Tài khoản của bạn không đủ để đăng tin</h4>";
            }
        }

        $tinraovat = new Tinraovat();
        $paginatorRV = new Paginate($currentPage, new Tinkhachhang(), self::LIMITED_REDCORD_RV, ' ma_loai_tin = ' . Tinraovat::CODE_RV);
        $listTinRV = $tinraovat->listTinRV($paginatorRV);
        //render view
        $data = array(
            'form' => $form,
            'listTinRV' => $listTinRV,
            'paginatorRV' => $paginatorRV,
            'urlPaginatorRV' => 'rao_vat/pagedtrv?page=',
            'ajaxElementId' => '#table-rv',
            'noticeMessage' => $noticeMessage
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('dang_tin', $data);
        } else {
            $this->render('dang_tin', $data);
        }
    }

    public function actionPagedtrv() {
        $this->actionIndex(Yii::app()->request->getParam('page'), self::LIMITED_REDCORD_RV);
    }

    public function actionTim_kiem() {
        if (Yii::app()->request->isAjaxRequest) {
            $diaDiem = Yii::app()->request->getParam('dia-diem');
            $ngayDang = Yii::app()->request->getParam('ngay-dang');
            $maLoaiTinRV = Yii::app()->request->getParam('ma-loai-tin-rv');
            $condition = '';

            $condition .= (isset($diaDiem) && $diaDiem != -1 && $diaDiem != 0) ? " AND tinh_thanh=" . $diaDiem : '';
            $condition .= ($ngayDang) ? " AND DATE(ngay_dang)='$ngayDang'" : '';
            $condition .=($maLoaiTinRV && $maLoaiTinRV != -1) ?
                    ' AND tinkhachhang.ma_tin IN (' .
                    Tinraovat::listMaTin(' AND ma_loai_tin_rv =' . $maLoaiTinRV)
                    . ')' : '';
            Yii::app()->session['condition'] = $condition;
            $this->actionIndex(null, self::LIMITED_RECORD_RVI, $condition, false);
        }
    }

    public function actionXem_chi_tiet() {
        $matin = Yii::app()->request->getParam('id');
        //Nếu không tồn tại mã loại xe thì sẽ redirect về trang chủ
        if($matin == ''){
            $this->redirect(Yii::app()->homeUrl);
        }
        
        $modeltrv = new Tinraovat();
        if (!$tinraovat = $modeltrv->getTinraovat($matin)) {
            $this->redirect(['site/index']);
        }

        $this->render('xem_chi_tiet', [
            'tinraovat' => $tinraovat
        ]);
    }
}
