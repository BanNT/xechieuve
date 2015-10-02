<?php

class m150914_073914_tinghepxe extends CDbMigration {

    public function safeUp() {
        $this->createTable('tinghepxe', array(
            'ma_tin' => 'pk',
            'ma_khach_hang' => 'INT(11) NOT NULL',
            'noi_di_tinh' => "VARCHAR(30) NOT NULL",
            'noi_di_huyen' => "VARCHAR(30) NOT NULL",
            'noi_den_tinh' => "VARCHAR(30) NOT NULL",
            'noi_den_huyen' => "VARCHAR(30) NOT NULL",
            'lich_trinh' => 'VARCHAR(40)',
            'ngay_khoi_hanh' => "DATE",
            'gio_khoi_hanh' => 'VARCHAR(2)',
            'so_dien_thoai' => 'VARCHAR(11) NOT NULL',
            'nguoi_lien_lac' => 'VARCHAR(80) NOT NULL',
            'tieu_de_tin' => "VARCHAR(100) NOT NULL",
            'noi_dung' => 'TEXT',
            'loai_xe' => "VARCHAR(40)",
            'ngay_dang' => "DATETIME",
            'ma_loai_tin' => "INT(11) NOT NULL"
        ));

        $this->addForeignKey('fk_tinghepxe_loaitin', 'tinghepxe', 'ma_loai_tin', 'loaitin', 'ma_loai_tin');
        $this->addForeignKey('fk_tinghepxe_khachhang', 'tinghepxe', 'ma_khach_hang', 'khachhang', 'ma_khach_hang');
    }

}
