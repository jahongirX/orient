<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $index
 * @property string $person_type
 * @property string $firm_name
 * @property string $passport
 * @property string $text
 * @property integer $admissionId
 * @property integer $time
 * @property integer $status
 * @property string $uniqid
 * @property integer $reply_time
 * @property string $reply_text
 * @property integer $reply_by
 * @property integer $image
 *
 * @property Admission $admission
 * @property User $replyBy
 */
class Reception extends \yii\db\ActiveRecord
{
    const STATUS_RECEIVED = 0;
    const STATUS_WORKING = 1;
    const STATUS_DONE = 2;
    const PERSON_PHYSIC = 0;
    const PERSON_LEGAL = 1;
    const MANUAL_RECEPTION = 'manual_reception';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reception';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'text', 'admissionId', 'uniqid'], 'required'],
            [['name', 'person_type', 'text', 'reply_text'], 'string'],
            [['index', 'admissionId', 'status', 'time', 'reply_time', 'phone', 'reply_by'], 'integer'],
            [['email', 'firm_name','image'], 'string', 'max' => 256],
            [['uniqid'], 'string', 'max' => 24],
            [['address'], 'string', 'max' => 512],
            [['passport'], 'string', 'max' => 12],
            [['admissionId'], 'exist', 'skipOnError' => true, 'targetClass' => Admission::className(), 'targetAttribute' => ['admissionId' => 'id']],
            [['reply_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['reply_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'F.I.SH'),
            'email' => Yii::t('main', 'Email'),
            'phone' => Yii::t('main', 'Telefon raqami'),
            'address' => Yii::t('main', 'Manzil'),
            'index' => Yii::t('main', 'Pochta indeksi'),
            'person_type' => Yii::t('main', 'Shaxs turi'),
            'firm_name' => Yii::t('main', 'Yuridik firma nomi'),
            'passport' => Yii::t('main', 'Passport raqami'),
            'text' => Yii::t('main', 'Savol matni'),
            'admissionId' => Yii::t('main', 'Admission id'),
            'time' => Yii::t('main', 'Time'),
            'status' => Yii::t('main', 'Status'),
            'uniqid' => Yii::t('main', 'Uniqid'),
            'reply_time' => Yii::t('main', 'Reply Time'),
            'reply_text' => Yii::t('main', 'Reply Text'),
            'reply_by' => Yii::t('main', 'Reply By'),
        ];
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord)
        {
            $this->time = time();
        }
        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmission()
    {
        return $this->hasOne(Admission::className(), ['id' => 'admissionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplyBy()
    {
        return $this->hasOne(User::className(), ['id' => 'reply_by']);
    }
}
