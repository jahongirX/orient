<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_category_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $name
 * @property string $description
 */
class ProductCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'name', 'description'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main','ID'),
            'lang' => Yii::t('main','Lang'),
            'parent' => Yii::t('main','Parent'),
            'name' => Yii::t('main','Name'),
            'description' => Yii::t('main','Description'),
        ];
    }
}
