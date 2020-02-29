<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ReceptionForm is the model behind the Reception form.
 */
class ReceptionForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $index;
    public $person_type;
    public $firm_name;
    public $passport;
    public $text;
    public $verifyCode;
    public $admissionId;
    public $uniqid;
    public $region;
    public $district;
    public $image;
    public $type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'passport', 'text', 'admissionId', 'region', 'district','type'], 'required'],
            [['name', 'person_type', 'text'], 'string'],
            [['admissionId'], 'exist', 'targetClass' => Admission::className(), 'targetAttribute' => ['admissionId' => 'id']],
            [['index'], 'integer'],
            [['email', 'firm_name','image'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 24],
            [['address'], 'string', 'max' => 512],
            [['passport'], 'string', 'max' => 12],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
//            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, doc,pdf,djvu,docx,rar,ppt'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => Yii::t('main', 'Verification Code'),
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
            'district' => Yii::t('main', 'District'),
            'region' => Yii::t('main', 'Region'),
            'image' => Yii::t('main', 'File'),


        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }

    public function save()
    {
        $region = Region::findOne($this->region)->name;
        $district = District::findOne($this->district)->name;

        if($this->type==1)
        {
            $type = 'Жалоба';

        } else if ($this->type == 2) {

            $type = 'Предложение';

        } else {

            $type = 'Заявление';

        }

        $this->uniqid = date('ymd-').uniqid();
        $model = new Reception();
        $model->name = $this->name;
        $model->email = $this->email;
        $model->phone = $this->phone;
        $model->address = $region.', '.$district.', '.$this->address;
        $model->index = $this->index;
        $model->person_type = $this->person_type;
        $model->firm_name = $this->firm_name;
        $model->passport = $this->passport;
        $model->text = $type.": \n".$this->text;
        $model->admissionId = $this->admissionId;
        $model->uniqid = $this->uniqid;
        $model->image = $this->image;

        if($model->save())
        {
            return true;

        } else {

            return false;

        }
    }
}
