<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_category_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $title
 * @property string $description
 */
class ServiceCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_category_lang';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'name', 'description'], 'required'],
            [['parent', 'lang', 'status'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'name' => Yii::t('main','Title'),
            'description' => Yii::t('main','Description'),
        ];
    }
}
