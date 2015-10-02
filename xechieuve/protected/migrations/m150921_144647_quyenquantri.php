<?php

class m150921_144647_quyenquantri extends CDbMigration {

    public function safeUp() {
        $this->createTable('quyenquantri', array(
            'ma_quyen' => 'pk',
            'loai_quyen' => 'VARCHAR(80) NOT NULL'
        ));
    }

}
