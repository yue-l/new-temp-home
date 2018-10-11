<?php

namespace frontend\models;

use Yii;
use app\models\Refueldetail;

/**
* This is the model class for table "vehicle".
*
* @property integer $id
* @property string $body_type
* @property string $odometer
* @property string $brand
* @property string $cost
* @property string $year
* @property string $fuel
* @property string $model
* @property string $plate
* @property integer $user_id
*
* @property Refueldetail[] $refueldetail
* @property User $user
*/
class Vehicle extends \yii\db\ActiveRecord {
  /**
  * @inheritdoc
  */
  public static function tableName() {
    return 'vehicle';
  }

  /**
  * @inheritdoc
  */
  public function rules() {
    return [
      [['plate','brand', 'odometer'], "required"],
      [['year', 'odometer', 'cost', 'fuel', 'traveldistance'], 'number'],
      [['model', 'plate', 'brand', 'body_type'], 'string'],
      [['user_id'], 'integer'],
      [['isdelete'], 'boolean'],
      [['brand','model','plate', 'body_type'],
      'match', 'not' => true, 'pattern' => '/[^0-9a-zA-Z_-]/',
      'message' => 'Contains invalid characters. Only letters, hyphens and underscores allowed',],
    ];
  }

  public static function create($model, $user_id) {
    $model->user_id = $user_id;
    if(!$model->save()){
      print_r($model->getErrors());
    }
  }

  public static function removeCar($car_id) {
    $car = Vehicle::findOne(intval($car_id));
    $car->isdelete = true;
    if(!$car->save()){
      print_r($car->getErrors());
    }
    return $car->plate;
  }

  public static function updateCarDetails($refuel) {
    $car = Vehicle::findOne($refuel->vehicle);
    $refuels = Refueldetail::find()
      ->where(['vehicle' => $refuel->vehicle])
      ->orderBy('createdtime DESC')
      ->all();

    $totalDis = 0;
    $totalCost = 0;
    $totalFuel = 0;
    foreach ($refuels as $temp) {
      // net distance
      $totalDis += $temp->currentodo - $temp->previousodo;
      $totalCost += $temp->fuelcost;
      $totalFuel += $temp->fuelamount;
    }
    // latest odo
    $car->odometer = $refuel->currentodo;

    $car->cost = $totalCost;
    $car->fuel = $totalFuel;
    $car->traveldistance = $totalDis;
    if(!$car->save()) {
      print_r($car->getErrors());
    }
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'plate' => 'Plate Number',
      'body_type' => 'Body Type',
      'odometer' => 'Current Odo Reading',
      'brand' => 'Make',
      'cost' => 'Overral Cost',
      'year' => 'Year',
      'fuel' => 'Overral Fuel Consumption',
      'model' => 'Model',
      'user_id' => 'User ID',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getRefueldetail() {
    return $this->hasMany(Refueldetail::className(), ['vehicle' => 'id']);
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUser() {
    return $this->hasOne(User::className(), ['id' => 'user_id']);
  }
}
