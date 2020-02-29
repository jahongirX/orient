<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $name
 */
class RegionLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'name'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => Yii::t('main', 'Name'),
        ];
    }
}
