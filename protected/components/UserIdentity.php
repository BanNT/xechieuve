<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$connection=yii::app()->db;
                $com="SELECT  `ma_khach_hang`,`ten_dang_nhap`, `password`FROM `khachhang`";
                $com.="where `ten_dang_nhap` = '".$this->username."' and ";
                $com.="`password` = '".$this->password."'";
                $comand=$connection->createCommand($com)->query();
                $comand->bindColumn(2, $this->username);
                $comand->bindColumn(3, $this->password);
                while ($comand->read()!==false)
                {
                $this->errorCode=  self::ERROR_NONE;
                return!$this->errorCode;
                }
	}
}