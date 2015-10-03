<?php

class m150914_073909_tinraovat extends CDbMigration {

    public function safeUp() {
        $this->createTable('tinraovat', array(
            'ma_tin' => 'pk',
            'ma_khach_hang' => 'INT(11) NOT NULL',
            'he_ten' => "VARCHAR(80) NOT NULL",
            'so_dien_thoai' => "VARCHAR(11) NOT NULL",
            'tinh' => "VARCHAR(30)",
            'tieu_de_tin' => "VARCHAR(100)",
            'noi_dung' => "TEXT",
            'ngay_dang' => "DATETIME",
            'anh1' => "VARCHAR(200)",
            'anh1' => "VARCHAR(200)",
            'ma_loai_tin' => "INT(11) NOT NULL"
        ));

        $this->addForeignKey('fk_tinraovat_loaitin', 'tinraovat', 'ma_loai_tin', 'loaitin', 'ma_loai_tin');
        $this->addForeignKey('fk_tinraovat_khachhang', 'tinraovat', 'ma_khach_hang', 'khachhang', 'ma_khach_hang');
    }

}
