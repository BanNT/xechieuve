<?php

class m150921_144442_quantrivien extends CDbMigration {

    public function safeUp() {
        $this->createTable('quantrivien', array(
            'ma_qtv' => 'pk',
            'ten_qtv' => 'VARCHAR(80)',
            'email' => 'VARCHAR(80)',
            'password' => 'VARCHAR(80)',
            'trang_thai' => 'TINYINT(1) DEFAULT 1'
        ));
    }

}
