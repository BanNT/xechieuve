<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $record = Khachhang::model()->findByAttributes(array('ten_dang_nhap' => $this->username));
        if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($record->password !== $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->setState('userId', $record->ma_khach_hang);
            $this->setState('name', $record->ten_khach_hang);
            $this->errorCode = self::ERROR_NONE;
        }
        
        return !$this->errorCode;
    }

}
