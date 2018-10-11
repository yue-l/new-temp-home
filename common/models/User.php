<?php

namespace common\models;

use Yii;

/**
* This is the model class for table "user".
*
* @property integer $id
* @property string $username
* @property string $password
* @property string $authkey
* @property string $accesstoken
* @property string $email
* @property string $role
*
* @property Vehicle[] $vehicles
*/
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
  /**
  * @inheritdoc
  */
  public static function tableName() {
    return 'user';
  }

  /**
  * @inheritdoc
  */
  public function rules() {
    return [
      [['username', 'password', 'authkey', 'accesstoken', 'email', 'role'], 'string'],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'username' => 'Username',
      'password' => 'Password',
      'authkey' => 'Authkey',
      'accesstoken' => 'Accesstoken',
      'email' => 'Email',
    ];
  }

  /**
  * @inheritdoc
  */
  public static function findIdentity($id) {
    return static::findOne($id);
  }

  public static function create($model) {
    $user = new User();
    $user->username = $model->username;
    $user->password = $model->password;
    $user->email = $model->email;
    $user->role = "user";
    if(!$user->save()){
      die();
    }
    // Yii::$app->params['adminEmail'];
    // Yii::$app->mailer->compose()
    // ->setTo($user->email)
    // ->setFrom('admin@randomizlogic.co')
    // ->setSubject("Welcome to Randomizlogic")
    // ->setTextBody()
    // ->send();
  }

  /**
  * @inheritdoc
  */
  public static function findIdentityByAccessToken($token, $type = null) {
    $alltheusers = User::find()->all();
    foreach ($alltheusers as $user) {
      if ($user->accesstoken === $token) {
        return new static($user);
      }
    }
    return null;
  }

  /**
  * Finds user by username
  *
  * @param  string      $username
  * @return static|null
  */
  public static function findByUsername($username) {
    $alltheusers = User::find()->all();
    foreach ($alltheusers as $user) {
      if (strcasecmp($user->username, $username) === 0) {
        return $user;
      }
    }
    return null;
  }

  /**
  * @inheritdoc
  */
  public function getId() {
    return $this->id;
  }

  /**
  * @inheritdoc
  */
  public function getAuthKey() {
    return $this->authkey;
  }

  /**
  * @inheritdoc
  */
  public function validateAuthKey($authkey) {
    return $this->authkey === $authkey;
  }

  /**
  * Validates password
  *
  * @param  string  $password password to validate
  * @return boolean if password provided is valid for current user
  */
  public function validatePassword($password) {
    return $this->password === $password;
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getVehicles() {
    return $this->hasMany(Vehicle::className(), ['user_id' => 'id']);
  }
}
