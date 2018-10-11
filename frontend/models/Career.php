<?php

namespace frontend\models;

use Yii;

/**
* This is the model class for table "career".
*
* @property integer $id
* @property integer $isjoin
* @property string $company
* @property string $date
* @property string $brief
* @property string $achieve
* @property string $modalname
* @property string $logoname
*/
class Career extends \yii\db\ActiveRecord {
  /**
  * @inheritdoc
  */
  public static function tableName() {
    return 'career';
  }

  /**
  * @inheritdoc
  */
  public function rules() {
    return [
      [['company', 'date', 'brief', 'achieve', 'modalname', 'logoname'], 'string'],
      [['isjoin', 'sequence'], 'integer'],
      [['isjoin', 'company', 'date', 'brief', 'logoname', 'sequence'], 'required'],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'sequence' => "Order",
      'isjoin' => 'Isjoin',
      'company' => 'Company',
      'date' => 'Date',
      'brief' => 'Brief',
      'achieve' => 'Achieve',
      'modalname' => 'Modalname',
      'logoname' => 'Logoname',
    ];
  }

  public static function create($model){
    if(!$model->save()){
      print_r($model->getErrors());
    }
  }
}
