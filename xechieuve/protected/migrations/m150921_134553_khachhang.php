<?php

class m150921_134553_khachhang extends CDbMigration {

    public function safeUp() {
        $this->createTable('khachhang', array(
            'ma_khach_hang' => 'pk',
            'ten_khach_hang' => 'VARCHAR(80) NOT NULL',
            'ten_dang_nhap' => 'VARCHAR(80) NOT NULL',
            'password' => 'VARCHAR(40) NOT NULL',
            'email' => 'VARCHAR(80)',
            'dia_chi' => 'VARCHAR(2)',
            'so_dien_thoai' => 'VARCHAR(11) NOT NULL',
            'so_du_tai_khoan' => 'INT(12) DEFAULT 0',
            'anh_dai_dien' => 'VARCHAR(255) NULL'
        ));
    }

}
