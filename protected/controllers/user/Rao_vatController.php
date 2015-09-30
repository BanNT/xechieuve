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
            'urlPaginatorRV' => 'rao_vat/pagerv?p=',
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
        $this->actionIndex($_GET['p'], self::LIMITED_RECORD_RVI, $condition, false);
    }

    /**
     * Đăng tin rao vặt
     */
    public function actionDang_tin($currentPage = 1) {
        $form = new CForm('application.views.user.rao_vat.dang_tinForm');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinraovat']->model = $tinraovat = new Tinraovat();
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
            'urlPaginatorRV' => 'rao_vat/pagedtrv?p=',
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

        $this->actionIndex($_GET['p'], self::LIMITED_REDCORD_RV);
    }

    public function actionTim_kiem() {
        if (Yii::app()->request->isAjaxRequest) {
            $condition = '';
            $condition .= (isset($_POST['dia-diem']) && $_POST['dia-diem'] != -1 && $_POST['dia-diem'] != 0) ? " AND tinh_thanh=" . $_POST['dia-diem'] : '';
            $condition .= ($ngayDang = $_POST['ngay-dang']) ? " AND DATE(ngay_dang)='$ngayDang'" : '';
            $condition .=($_POST['ma-loai-tin-rv'] && $_POST['ma-loai-tin-rv'] != -1) ?
                    ' AND tinkhachhang.ma_tin IN (' .
                    Tinraovat::listMaTin(' AND ma_loai_tin_rv =' . $_POST['ma-loai-tin-rv'])
                    . ')' : '';
            Yii::app()->session['condition'] = $condition;
            $this->actionIndex(null, self::LIMITED_RECORD_RVI, $condition, false);
        }
    }

}
