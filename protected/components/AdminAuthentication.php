<?php

/**
 * @author Tran Van Hoang <phatradang@gmail.com>
 * Authenticates an administrator
 */
class AdminAuthentication extends CUserIdentity {

    private $_id;

    /**
     * Authenticates an administrator.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $record = Quantrivien::model()->findByAttributes(array('email' => $this->username));

        if (!$record) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif ($record->password != Quantrivien::saltPassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->username = $record->ma_qtv;
            $this->setState('adminId', $record->ma_qtv);
            $this->setState('adminName', $record->ten_qtv);
            $this->errorCode = self::ERROR_NONE;
        }

        return $this->errorCode;
    }

}
