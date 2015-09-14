<?php

class m150914_072955_phanquyenquantri extends CDbMigration {

    public function safeUp() {
        $this->createTable('phanquyenquantri', array(
            'ma_quyen' => 'INT(11)',
            'ma_quan_tri_vien' => 'INT(11)',
        ));
    }

}
