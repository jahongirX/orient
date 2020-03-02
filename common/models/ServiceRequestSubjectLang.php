<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_request_subject_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $name
 * @property integer $status
 */
class ServiceRequestSubjectLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_request_subject_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'name'], 'required'],
            [['parent', 'lang', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'lang' => 'Lang',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
