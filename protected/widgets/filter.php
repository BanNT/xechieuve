<?php
/**
 * Quản lý hiển thị bảng danh sách các loại xe để lọc ra tin đăng cần thiết
 */
class filter extends CWidget{
    public function init(){
        
    }
    
    public function run(){
        $this->render('filter');
    }
}