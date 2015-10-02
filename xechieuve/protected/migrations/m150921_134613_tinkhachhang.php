<?php

class m150921_134613_tinkhachhang extends CDbMigration {

    public function safeUp() {
        $this->createTable('tinkhachhang', array(
            'ma_tin' => 'pk',
            'ma_khach_hang' => 'INT(11) NOT NULL',
            'nguoi_lien_lac' => 'VARCHAR(80) NOT NULL',
            'so_dien_thoai' => 'VARCHAR(11) NOT NULL',
            'tieu_de_tin' => 'VARCHAR(80)',
            'noi_dung_tin' => 'TEXT',
            'tinh_thanh' => 'VARCHAR(2)',
            'ngay_dang' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'ma_loai_tin' => 'INT(11)'
        ));

        $this->addForeignKey('PK_tinkhachhang_khachhang', 'tinkhachhang', 'ma_khach_hang', 'khachhang', 'ma_khach_hang');
        $this->addForeignKey('PK_tinkhachhang_loaitin', 'tinkhachhang', 'ma_loai_tin', 'loaitin', 'ma_loai_tin');
    }

}
