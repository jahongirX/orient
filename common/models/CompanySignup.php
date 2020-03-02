<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_signup}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $director
 * @property string $phone
 * @property string $email
 * @property string $fax
 * @property integer $region
 * @property integer $district
 * @property string $address
 * @property string $index
 * @property string $product
 * @property string $file
 * @property string $mfo
 * @property string $inn
 * @property string $okonx
 * @property string $rs
 * @property string $opf
 * @property string $fs
 * @property string $soato
 * @property string $okpo
 * @property string $text
 *
 * @property Region $region0
 * @property District $district0
 */
class CompanySignup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_signup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'director', 'phone', 'email', 'region', 'district', 'address', 'product', 'mfo', 'inn', 'rs'], 'required'],
            [['region', 'district'], 'integer'],
            [['text'], 'string'],
            [['name', 'director', 'phone', 'email', 'fax', 'address'], 'string', 'max' => 256],
            [['index'], 'string', 'max' => 10],
            [['product'], 'string', 'max' => 500],
            [['file'], 'string', 'max' => 100],
            [['mfo', 'okonx'], 'string', 'max' => 5],
            [['inn'], 'string', 'max' => 9],
            [['rs'], 'string', 'max' => 30],
            [['opf'], 'string', 'max' => 4],
            [['fs'], 'string', 'max' => 3],
            [['soato'], 'string', 'max' => 7],
            [['okpo'], 'string', 'max' => 8],
            [['region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region' => 'id']],
            [['district'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district' => 'id']],
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
            'director' => Yii::t('main', 'Director'),
            'phone' => Yii::t('main', 'Phone'),
            'email' => Yii::t('main', 'Email'),
            'fax' => Yii::t('main', 'Fax'),
            'region' => Yii::t('main', 'Region'),
            'district' => Yii::t('main', 'District'),
            'address' => Yii::t('main', 'Address'),
            'index' => Yii::t('main', 'Index'),
            'product' => Yii::t('main', 'Product'),
            'file' => Yii::t('main', 'File'),
            'mfo' => Yii::t('main', 'Mfo'),
            'inn' => Yii::t('main', 'Inn'),
            'okonx' => Yii::t('main', 'Okonx'),
            'rs' => Yii::t('main', 'Hisob raqami'),
            'opf' => Yii::t('main', 'Opf'),
            'fs' => Yii::t('main', 'Fs'),
            'soato' => Yii::t('main', 'Soato'),
            'okpo' => Yii::t('main', 'Okpo'),
            'text' => Yii::t('main', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion0()
    {
        return $this->hasOne(Region::className(), ['id' => 'region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict0()
    {
        return $this->hasOne(District::className(), ['id' => 'district']);
    }
}
