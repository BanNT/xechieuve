<?php

class m150914_074127_loaianh extends CDbMigration {

    public function safeUp() {
        $this->createTable('loaianh', array(
            'ma_loai_anh' => 'pk',
            'ten_loai_anh' => 'VARCHAR(80) NOT NULL',
        ));
    }

}
