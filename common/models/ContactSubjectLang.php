<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_subject_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $name
 * @property integer $status
 */
class ContactSubjectLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_subject_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'name', 'status'], 'required'],
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
