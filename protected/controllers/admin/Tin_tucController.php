<?php

class Tin_tucController extends Controller {

    /**
     * action này sẽ hiển thị danh sách tin đã đăng với các trường như tiêu đề tin, ngày đăng
     * trạng thái
     */
    public function actionIndex() {
        $tintuc = Yii::app()->db->createCommand()
                ->select('ma_tin,tieu_de,noi_dung,anh,date(ngay_dang) as ngay_dang, tom_tat,trang_thai')
                ->from('tintuc')
                ->order('ngay_dang DESC')
                ->queryAll();
        $data = array(
            'tintuc' => $tintuc,
        );
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', $data);
        } else if (isset($_GET['action'])) {
            $id = $_GET['action'];
            if ($id != NULL) {
                echo"id la:" . $id;
            }
            $this->renderPartial('update');
        } else {
            $this->render('index', $data);
        }
    }

    /**
     * action này thực hiện việc sửa tin
     */
    public function actionSua_tin_dang() {
        $id = $_GET['action'];
        if ($id != NULL) {
            echo"id la:" . $id;
        }
        $this->render('update');
    }

    /**
     * xóa tin tức
     */
    public function actionXoa_tin_dang() {
        
    }

    /**
     * action này sẽ thực hiện việc đăng tin, tạm thời bà cứ làm phần này trước.
     * Cách tạo form thế nào thì tham khảo mấy cái bên user ấy rồi tạo
     */
    public function actionDang_tin() {
        
    }

}
