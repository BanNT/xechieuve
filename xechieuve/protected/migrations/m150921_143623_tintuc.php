<?php

class m150921_143623_tintuc extends CDbMigration {

    public function safeUp() {
        $this->createTable('tintuc', array(
            'ma_tin' => 'pk',
            'tieu_de' => 'VARCHAR(80) NOT NULL',
            'tom_tat' => 'VARCHAR(250) NOT NULL',
            'noi_dung' => 'TEXT NOT NULL',
            'anh' => 'VARCHAR(255)',
            'ngay_dang' => 'DATETIME',
            'trang_thai' => 'TINYINT(1) DEFAULT 0',
            'meta_keyword' => 'VARCHAR(90)',
            'meta_Description' => 'VARCHAR(110)'
        ));
    }

}
