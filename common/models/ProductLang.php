<?php

namespace common\models;

use Yii;

class ProductLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'lang', 'parent'], 'integer'],
            [['lang', 'parent', 'name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['text'],'string'],
            [['description'], 'string', 'max' => 300],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'description' => Yii::t('main', 'Description'),
            'image' => Yii::t('main', 'Image'),
            'price' => Yii::t('main', 'Price'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
