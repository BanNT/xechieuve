<?php

class m150921_143057_tinraovat extends CDbMigration {

    public function safeUp() {
        $this->createTable('tinraovat', array(
            'ma_tin' => 'INT(11) NOT NULL',
            'anh' => 'VARCHAR(510) NULL',
            'gia_rao_vat' => 'INT(12) DEFAULT 0',
            'ma_loai_tin_rv' => 'INT(11) NOT NULL'
        ));

        $this->addForeignKey('PK_tinraovat_tinkhachhang', 'tinraovat', 'ma_tin', 'tinkhachhang', 'ma_tin', 'CASCADE', 'CASCADE');
        $this->addForeignKey('PK_tinraovat_loaitinraovat', 'tinraovat', 'ma_loai_tin_rv', 'loaitinraovat', 'ma_loai_tin_rv');
    }

}
