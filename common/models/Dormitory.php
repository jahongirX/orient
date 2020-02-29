<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "dormitory".
 *
 * @property int $id
 * @property string $name
 * @property string $s_name
 * @property string $f_name
 * @property string $birth_date
 * @property int $country_id
 * @property int $region_id
 * @property int $district_id
 * @property int $male
 * @property int $passport_serial
 * @property int $passport_number
 * @property string $address
 * @property string $student_doc
 * @property string $inn
 */
class Dormitory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dormitory';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date']
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 's_name', 'f_name', 'birth_date', 'region_id', 'district_id', 'male', 'passport_serial', 'passport_number', 'address'], 'required'],
            [['birth_date','reply_time','created_date'], 'safe'],
            [['status','country_id', 'region_id', 'district_id', 'male', 'passport_number','course','guruh'], 'integer'],
            [['address'], 'string'],
            [['reply_by','name', 's_name', 'f_name', 'student_doc', 'inn'], 'string', 'max' => 255],
            [['passport_serial'],'string','max'=>3],
            [['unique_id'],'string','max'=>500],
            [['reply_text'],'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('main','name'),
            's_name' => Yii::t('main','second_name'),
            'f_name' => Yii::t('main','fathers_name'),
            'birth_date' => Yii::t('main','birth_date'),
            'country_id' => 'Country ID',
            'region_id' => Yii::t('main','region'),
            'district_id' => Yii::t('main','district'),
            'male' => Yii::t('main','male'),
            'passport_serial' => Yii::t('main','passport_ser'),
            'passport_number' => Yii::t('main','passport_num'),
            'address' => Yii::t('main','address'),
            'student_doc' => Yii::t('main','student_doc'),
            'inn' => Yii::t('main','inn'),
            'guruh'=> Yii::t('main','guruh'),
            'course' => Yii::t('main','course'),
        ];
    }
}
