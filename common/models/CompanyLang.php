<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $name
 * @property string $anons
 * @property string $body
 * @property string $phone
 * @property string $address
 * @property string $leader
 */
class CompanyLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'name', 'anons', 'body'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['name', 'phone', 'leader'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
            [['anons'], 'string', 'max' => 300],
            [['body'], 'string'],
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
            'anons' => Yii::t('main', 'Anons'),
            'body' => Yii::t('main', 'Body'),
            'phone' => Yii::t('main', 'Phone'),
            'address' => Yii::t('main', 'Address'),
            'leader' => Yii::t('main', 'Leader'),
        ];
    }
}
