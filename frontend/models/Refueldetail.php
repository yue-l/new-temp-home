<?php

namespace frontend\models;

use Yii;
use \DateTime;

/**
* This is the model class for table "refueldetail".
*
* @property integer $id
* @property integer $vehicle
* @property integer $currentodo
* @property string $fuelamount
* @property string $fuelcost
* @property string $createdtime
*
* @property Vehicle $vehicle0
*/
class Refueldetail extends \yii\db\ActiveRecord {
  /**
  * @inheritdoc
  */
  public static function tableName() {
    return 'refueldetail';
  }

  public static function create($refuel) {
    $datetime = date('Y-m-d H:i:s');
    $refuel->createdtime = $datetime;
    if(!$refuel->save()){
      print_r($refuel->getErrors());
    }
  }

  /**
  * @inheritdoc
  */
  public function rules() {
    return [
      [['vehicle', 'currentodo', 'fuelamount', 'fuelcost',], 'required'],
      [['vehicle', 'currentodo', 'previousodo'], 'integer'],
      [['fuelamount', 'fuelcost'], 'number'],
      [['createdtime'], 'safe'],
      ['currentodo', 'compare', 'compareAttribute' => 'previousodo', 'operator' => '>', 'type' => 'number', 'message'=>"Car's new odo reading must be higher."],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'vehicle' => 'Car ID',
      'currentodo' => 'Current Odo Reading',
      'fuelamount' => 'Refuel Amount',
      'fuelcost' => 'Refule Cost',
      'createdtime' => 'Created Timestamp',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getVehicle() {
    return $this->hasOne(Vehicle::className(), ['id' => 'vehicle']);
  }
}
