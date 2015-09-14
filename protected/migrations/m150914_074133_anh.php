<?php

class m150914_074133_anh extends CDbMigration {

    public function safeUp() {
        $this->createTable('anh', array(
            'ma_loai_anh' => 'INT(11) NOT NULL',
            'anh' => 'VARCHAR(200) NOT NULL',
        ));
        
        $this->addForeignKey('fk_anh_loaianh', 'anh', 'ma_loai_anh', 'loaianh', 'ma_loai_anh');
    }

}
