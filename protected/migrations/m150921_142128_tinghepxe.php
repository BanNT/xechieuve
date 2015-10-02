<?php

class m150921_142128_tinghepxe extends CDbMigration {

    public function safeUp() {
        $this->createTable('tinghepxe', array(
            'ma_tin' => 'INT(11) NOT NULL',
            'dia_chi_di' => 'VARCHAR(200) NOT NULL',
            'dia_chi_den'=> 'VARCHAR(200) NOT NULL',
            'noi_den_tinh'=>'VARCHAR(2) NOT NULL',
            'ngay_khoi_hanh'=>'DATE',
            'ma_loai_xe_ghep'=>'INT(11) NOT NULL'
        ));
        
        $this->addForeignKey('PK_tinghepxe_tinkhachhang', 'tinghepxe', 'ma_tin', 'tinkhachhang', 'ma_tin','CASCADE','CASCADE');
        $this->addForeignKey('PK_tinghepxe_loaixeghep', 'tinghepxe', 'ma_loai_xe_ghep', 'loaixeghep', 'ma_loai_xe_ghep');
        
    }
}
