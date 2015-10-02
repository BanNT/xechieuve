<?php

/**
 * Hiển thị mục searh tùy theo controller hiện tại
 */
class searchSelect extends CWidget {
    /**
     * Danh sách những views search tương ứng với controllers
     * @var array
     */
    private $__searchViews = [
        'khach_tim_xe' => 'searchKTX',
        'rao_vat' => 'searchRV'
    ];
    
    public function init() {
        
    }

    /**
     * @return string
     */
    public function run() {
        //tách tên controller hiện tại từ chuỗi route
        $route = explode('/', Yii::app()->controller->route);
        $controller = array_shift($route);
        
        //nếu đang ở trong controller có trong danh sách $__searchViews sẽ lấy
        //view search tương ứng với controller đó để hiển thị
        if (array_key_exists($controller, $this->__searchViews)) {
            $this->render($this->__searchViews[$controller]);
            return;
        }
        
        //view search mặc định sẽ là 'searchXTK'
        $this->render('searchXTK');
    }

}
