<?php

class Nap_tienController extends Controller {

    public $ma_khach_hang;
    public $so_du_tai_khoan;

    public function actionIndex() {
        if (isset($_POST['naptien'])) {
            
        }
        $this->render('index');
    }

    public function actionNap_tien() {
        $khachhang = new Khachhang();
        if (isset($_POST['naptien'])) {
            $so_du_tai_khoan_new = $this->so_du_tai_khoan = $_POST['so_du_tai_khoan'];
            $ma_khach_hang = $this->ma_khach_hang = $_POST['ma_khach_hang'];
            $khachhang->NapTien($so_du_tai_khoan_new, $ma_khach_hang);

            echo "Ok Nạp thành công";
        } else {
            echo "Nạp đê";
        }
        $this->render('nap_tien');
    }

}
