<?php

class m150921_144803_phanquyenquantri extends CDbMigration {

    public function safeUp() {
        $this->createTable('phanquyenquantri', array(
            'ma_quyen' => 'INT(11) NOT NULL',
            'ma_qtv' => 'INT(11) NOT NULL'
        ));

        $this->addForeignKey('PK_phanquyenquantri_quyenquantri', 'phanquyenquantri', 'ma_quyen', 'quyenquantri', 'ma_quyen');
        $this->addForeignKey('PK_phanquyenquantri_quantrivien', 'phanquyenquantri', 'ma_qtv', 'quantrivien', 'ma_qtv');
    }

}
