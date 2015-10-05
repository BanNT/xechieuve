<?php

class Tin_tucController extends Controller {
    /**
     * action này sẽ hiển thị danh sách tin đã đăng với các trường như tiêu đề tin, ngày đăng
     * trạng thái
     */
    public function actionIndex() {
        $this->render('index');
    }
    
    /**
     * action này thực hiện việc sửa tin
     */
    public function actionSua_tin_dang(){
        
    }
    
    /**
     * xóa tin tức
     */
    public function actionXoa_tin_dang(){
        
    }
    
    /**
     * action này sẽ thực hiện việc đăng tin, tạm thời bà cứ làm phần này trước.
     * Cách tạo form thế nào thì tham khảo mấy cái bên user ấy rồi tạo
     */
    public function actionDang_tin(){
        
    }

}
