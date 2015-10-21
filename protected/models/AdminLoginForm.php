<?php

/**
 * @author Tran Van Hoang <phatradang@gmail.com>
 * Form login intend for administrator
 */
class AdminLoginForm extends CFormModel {

    /**
     * @var string 
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var boolean
     */
    public $rememberMe;

    /**
     * @var AdminAuthentication 
     */
    private $_identity;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            //username and password are required
            array('username, password', 'required', 'message' => 'Bạn không được bỏ trống "{attribute}"'),
            // username have to be in email format
            array('username', 'email','message'=>'Username phải là email'),
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => 'username',
            'password' => 'password',
            'rememberMe' => 'Ghi nhớ đăng nhập',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if ($this->hasErrors()) {
            return false;
        }

        $this->_identity = new AdminAuthentication($this->username, $this->password);
        switch ((int)$this->_identity->authenticate()) {
            case CUserIdentity::ERROR_USERNAME_INVALID:
                $this->addError('username', 'Tài khoản này không tồn tại!');
                break;
            case CUserIdentity::ERROR_PASSWORD_INVALID:
                $this->addError('password', 'Bạn hãy nhập lại password!');
                break;
            case CUserIdentity::ERROR_NONE:
                return true;
            default :
                die("login error");
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity != null) {
            $this->_identity = new AdminAuthentication($this->username, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === AdminAuthentication::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }

        return false;
    }

}
