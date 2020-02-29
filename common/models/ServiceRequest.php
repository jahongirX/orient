<?php

namespace common\models;

use common\models\Services;
use Yii;

class ServiceRequest extends \common\components\Model
{

    public static function tableName()
    {
        return 'service_request';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'subject', 'company', 'message', 'service_id'], 'required'],
            [['email'], 'email'],
            [['service_id'], 'integer', 'min' => 1],
            [['name', 'phone', 'subject', 'company', 'message'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'email' => Yii::t('main', 'Email'),
            'phone' => Yii::t('main', 'Phone'),
            'subject' => Yii::t('main', 'Subject'),
            'company' => Yii::t('main', 'Company Name'),
            'message' => Yii::t('main', 'Message'),
            'service_id' => Yii::t('main', 'Service'),
        ];
    }

    public function getServiceRequestSubject(){
        return $this->hasOne(ServiceRequestSubject::className(),['id'=>'subject']);
    }

    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
