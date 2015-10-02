<?php

class m150921_141857_loaixeghep extends CDbMigration {

    public function safeUp() {
        $this->createTable('loaixeghep', array(
            'ma_loai_xe_ghep' => 'pk',
            'loai_xe_ghep' => 'NVARCHAR(50) NOT NULL'
        ));
    }

}
