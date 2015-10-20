<?php

/**
 * @author Tran Van Hoang <phatradang@gmail.com>
 * Authenticates an administrator
 */
class AdminAuthentication extends CUserIdentity {

    /**
     * Authenticates an administrator.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $record = Quantrivien::model()->findByAttributes(array('email' => $this->username));
        
        if (!$record) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif ($this->password != Quantrivien::saltPassword($record->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->setState('id', $record->ma_qtv);
            $this->setState('name', $record->ten_qtv);
            $this->errorCode = self::ERROR_NONE;
        }
        
        return $this->errorCode;
    }

    /**
     * Authorize
     */
//    protected function afterLogin(){
//        AdminAuthorization::authorize();
//    }
}
