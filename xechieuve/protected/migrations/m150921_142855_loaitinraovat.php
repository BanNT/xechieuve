<?php

class m150921_142855_loaitinraovat extends CDbMigration {

    public function safeUp() {
        $this->createTable('loaitinraovat', array(
            'ma_loai_tin_rv' => 'pk',
            'loai_tin_rv' => 'VARCHAR(80) NOT NULL'
        ));
    }

}
