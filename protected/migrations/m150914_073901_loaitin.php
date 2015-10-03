<?php

class m150914_073901_loaitin extends CDbMigration {

    public function safeUp() {
        $this->createTable('loaitin', array(
            'ma_loai_tin' => 'pk',
            'ten_loai_tin' => 'VARCHAR(80) NOT NULL',
            'gia_tien' => 'INT(12) NOT NULL',
        ));
    }

}
