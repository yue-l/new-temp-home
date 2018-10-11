<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
* LoginForm is the model behind the login form.
*/
class UserRegisterForm extends Model {
  public $username;
  public $password;
  public $checkpwd;
  public $email;
  public $usertype;
  private $_user = false;


  /**
  * @return array the validation rules.
  */
  public function rules() {
    return [
      // username and password are both required
      [['username', 'password', 'checkpwd', 'email', 'usertype'], 'required'],
      [['username', 'password', 'checkpwd'], 'string', 'length' => [4,24]],
      // must be an email
      ['email', 'email'],
      // validate
      [['username','password', 'checkpwd',],
      'match', 'not' => true, 'pattern' => '/[^0-9a-zA-Z_-]/',
      'message' => 'Contains invalid characters. Only letters, hyphens and underscores allowed',],
      ['checkpwd',
        'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false, 'message'=>"Passwords don't match"],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'username' => 'Username',
      'password' => 'Password',
      'checkpwd' => 'Enter Password Again',
      'email' => 'Email',
    ];
  }


}
