<?php
class UserIdentity extends CUserIdentity {
 
     public $autoLogin;
     private $_id;
 
     public function __construct($username, $password, $autoLogin) {
         $this->username = $username;
         $this->password = $password;
         $this->autoLogin = $autoLogin;
     }
 
     public function authenticate() {
         $user = User::model()->findByAttributes(array(
             'username' => $this->username
         ));
 
         if ($user === null) {
             $this->errorCode = self::ERROR_USERNAME_INVALID;
         } else {
             // check Auto or Not
             $password = ($this->autoLogin == false)
                 ? MSecure::password($this->username . $this->password . $user->registered)
                 : $this->password;
 
             if ($user->password !== $password) {
                 $this->errorCode = self::ERROR_PASSWORD_INVALID;
             } else {
                 $this->_id = $user->id;
                 if ($user->lastvisited === NULL) {
                     $lastLogin = new CDbExpression('NOW()');
                 } else {
                     $lastLogin = $user->lastvisited;
                 }
 
                 // RBAC
                 $roles = CJSON::decode($user->role);
                 $auth = Yii::app()->authManager;
                 foreach ($roles as $role) {
                     if (!$auth->isAssigned($role, $this->_id)) {
                         if ($auth->assign($role, $this->_id)) {
                             Yii::app()->authManager->save();
                         }
                     }
                 }
 
                 $this->setState('email', $user->email);
                 $this->setState('lastvisited', $lastLogin);
                 $this->errorCode = self::ERROR_NONE;
             }
         }
         return !$this->errorCode;
     }
 
     public function getId() {
         return $this->_id;
     }        
 }