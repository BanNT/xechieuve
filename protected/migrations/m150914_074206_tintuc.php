<?php

class m150914_074206_tintuc extends CDbMigration {

    public function safeUp() {
        $this->createTable('tintuc', array(
            'ma_tin_tuc' => 'pk',
            'tieu_de' => 'VARCHAR(100) NOT NULL',
            'anh_dai_dien' => 'VARCHAR(200) NOT NULL',
            'ngay_dang' => 'DATETIME',
            'tom_tat' => 'VARCHAR(200) NOT NULL',
            'noi_dung' => 'TEXT NOT NULL',
            'trang_thai' => 'TINYINT(1)',
            'metaKeyword' => 'VARCHAR(80) NOT NULL',
            'metaDescription' => 'VARCHAR(120) NOT NULL',
        ));
    }

}
