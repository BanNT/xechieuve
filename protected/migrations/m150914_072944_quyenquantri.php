<?php

class m150914_072944_quyenquantri extends CDbMigration {

    public function safeUp() {
        $this->createTable('quyenquantri', array(
            'ma_quyen' => 'pk',
            'loai_quyen' => 'VARCHAR(80) NOT NULL',
        ));
    }

}
