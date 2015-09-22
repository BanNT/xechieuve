<?php

class m150921_134604_loaitin extends CDbMigration {

    public function safeUp() {
        $this->createTable('loaitin', array(
            'ma_loai_tin' => 'pk',
            'loai_tin' => 'VARCHAR(80) NOT NULL',
            'gia_dang' => 'INT(12) NOT NULL'
        ));
    }

}
