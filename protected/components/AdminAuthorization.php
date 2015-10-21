<?php

/**
 * @author Tran Van Hoang <phatradang@gmail.com>
 * authorizes an administrator
 */
class AdminAuthorization extends CUserIdentity {
    
    /**
     * @var array 
     */
    private $_roles = array(
        'news',
        'administrator',
        'customer',
        'customer_news_type',
        'customer_news',
        'customer_task',
        'car_type'
    );
    
    /**
     * get all administrators have permission specified by $roldId
     * @param integer $roldId
     */
    final public static function getAdminHavePermission($roldId){
        if(!isset($this->_roles[$roldId])){
            return false;
        }
        
        
    }

    final static public function authorize() {
        //do something here ...
    }

}
