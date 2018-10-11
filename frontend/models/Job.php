<?php
namespace frontend\models;
use Yii;

use app\models\Fileupload;

/**
* This is the model class for table "job".
*
* @property integer $id
* @property string $title
* @property string $location
* @property string $company
* @property string $contact
* @property string $date
* @property integer $userid
*
* @property User $user
*/
class Job extends \yii\db\ActiveRecord {
  /**
  * @inheritdoc
  */
  public static function tableName() {
    return 'job';
  }

  /**
  * @inheritdoc
  */
  public function rules() {
    return [
      [['title', 'location', 'company', 'date'], 'required'],
      [['title', 'location', 'company', 'contact'], 'string'],
      [['date', 'document'], 'safe'],
      [['id', 'userid'], 'integer']
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels() {
    return [
      'id' => 'ID',
      'title' => 'Position Title',
      'location' => 'Job Location',
      'company' => 'Company Name',
      'contact' => 'Contact Person',
      'date' => 'Applied On',
      'userid' => 'Userid',
    ];
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUser() {
    return $this->hasOne(User::className(), ['id' => 'userid']);
  }

  public static function create($job, $userid) {
    // $datetime = $job->date;

    // $dmy = explode(' ', $datetime);
    // $dmy = $dmy[0];
    // $dmy = explode('/', $dmy);
    // $year = $dmy[2];
    // $month = $dmy[1];
    // $day = $dmy[0];
    // $hi = explode(' ', $datetime)[1];
    // $hour = explode(':', $hi)[0];
    // $minute = explode(':', $hi)[1];

    // $datetime = new \DateTime();
    // $datetime->setDate($year, $month, $day);
    // $datetime->setTime(intval($hour), intval($minute), 0);

    $job->date = date('Y-m-d H:i:s', strtotime('now'));
    $job->userid = $userid;
    if(!$job->save()){
      print_r($job->getErrors());
    }
    return $job;
  }


  public function uploadFiles() {
    var_dump($this);die();
    if(isset($this->document) && count($this->document) > 0) {
      foreach ($this->document as $tempDoc) :
        $fileupload = new Fileupload();
        $stripedDocName = str_replace('/', '-', $tempDoc->name);
        $nameArray = explode('.',$stripedDocName);
        $fileupload->extension = $nameArray[count($nameArray) - 1];
        $fileupload->filename = $nameArray[0];
        $fileupload->path = 'uploads/' . sprintf('%010d', $this->id) . '-' . $stripedDocName;
        if(!$fileupload->save()) {
          print_r($fileupload->getErrors());die();
        }
        $fileupload->hashtoken = hash('ripemd160',  sprintf('%010d', $fileupload->id));
        $fileupload->update();
        $tempDoc->saveAs($fileupload->path);
      endforeach;
    }
  }

}
