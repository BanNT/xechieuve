<?php

/**
 * create table quantrivien
 */
class m150914_072933_quantrivien extends CDbMigration {

    public function safeUp() {
        $this->createTable('quantrivien', array(
            'ma_quan_tri_vien' => 'pk',
            'ten_quan_tri_vien' => 'VARCHAR(80) NOT NULL',
            'email' => 'VARCHAR(80) NOT NULL',
            'password' => 'VARCHAR(40) NOT NULL',
            'trang_thai' => 'TINYINT(1)',
        ));
    }

}
