<?php

/**
 * 
 */
class Rao_vatController extends Controller {

    /**
     * Số bản ghi rao vặt tối đa được hiển thị ở trang index
     */
    const LIMITED_RECORD_RVI = 6;
    
    /**
     * Số bản ghi rao vặt tối đa được hiên thị ở trang đăng tin rao vặt
     */
    const LIMITED_REDCORD_RV = 3;

    /**
     * Hiển thị danh sách tin rao vặt
     * @param integer $currentPage
     */
    public function actionIndex($currentPage=1,$limit = self::LIMITED_RECORD_RVI) {
        $tinraovat = new Tinraovat();
        $paginatorRV = new Paginate($currentPage, new Tinkhachhang(), $limit, ' ma_loai_tin = ' . Tinraovat::CODE_RV);
        $listTinRV = $tinraovat->listTinRV($paginatorRV);

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
    
    public function actionPagerv(){
        $this->actionIndex($_GET['p']);
    }

    /**
     * Đăng tin rao vặt
     */
    public function actionDang_tin($currentPage=1) {
        $form = new CForm('application.views.user.rao_vat.dang_tinForm');
        $form['tinkhachhang']->model = new Tinkhachhang();
        $form['tinraovat']->model = $tinraovat = new Tinraovat();

        if ($form->submitted('dangtin') && $form->validate()) {
            $tinkhachhang = $form['tinkhachhang']->model;
            $tinraovat = $form['tinraovat']->model;

            //Nếu không đủ tiền để đăng tin sẽ không đăng
            if ($tinraovat->trutien()) {
                if ($tinkhachhang->save(false)) {
                    $image = CUploadedFile::getInstance($tinraovat, 'anh');
                    $newName = md5(microtime(true) . 'xechieuve') . $image->name;

                    $tinraovat->ma_tin = $tinkhachhang->ma_tin;
                    $tinraovat->anh = $newName;
                    $tinraovat->save(false);

                    //upload image
                    $image->saveAs(Tinraovat::IMAGE_DIR_RV . $newName);


                    echo "đăng tin rao vặt thành công";
                    return;
                }
            } else {
                echo "Tài khoản của bạn không đủ tiền để đăng tin";
                return;
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
                'ajaxElementId' => '#table-rv'
        );

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('dang_tin', $data);
        } else {
            $this->render('dang_tin', $data);
        }
    }

    public function actionPagedtrv(){
        $this->actionIndex($_GET['p'], self::LIMITED_REDCORD_RV);
    }
}
