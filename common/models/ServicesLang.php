<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $title
 */
class ServicesLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'title'], 'required'],
            [['parent', 'lang', 'status'], 'integer'],
            [['title', 'description'], 'string'],
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
            'title' => Yii::t('main','Title'),
        ];
    }
}
