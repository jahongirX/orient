<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property string $parent
 * @property string $val
 */
class SettingsLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'val'], 'required'],
            [['lang'], 'integer'],
            [['val'], 'string', 'max' => 1000],
            [['parent'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'lang' => Yii::t('main', 'Lang'),
            'parent' => Yii::t('main', 'Parent'),
            'val' => Yii::t('main', 'Val'),
        ];
    }
}
