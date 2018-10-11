<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_fileupload}}".
 *
 * @property integer $id
 * @property integer $job
 * @property string $hashtoken
 * @property string $filename
 * @property string $extension
 * @property integer $createdat
 * @property string $path
 */
class Fileupload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_fileupload}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job', 'createdat'], 'integer'],
            [['hashtoken', 'filename', 'extension', 'path'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job' => 'Job',
            'hashtoken' => 'Hashtoken',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'createdat' => 'Createdat',
            'path' => 'Path',
        ];
    }
}
