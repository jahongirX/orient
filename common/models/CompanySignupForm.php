<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ReceptionForm is the model behind the Reception form.
 */
class CompanySignupForm extends Model
{
    public $name;
    public $director;
    public $phone;
    public $email;
    public $fax;
    public $region;
    public $district;
    public $address;
    public $index;
    public $product;
    public $file;
    public $mfo;
    public $inn;
    public $okonx;
    public $rs;
    public $opf;
    public $fs;
    public $soato;
    public $okpo;
    public $text;

    public $verifyCode;


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
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => Yii::t('main', 'Verification Code'),
            'name' => Yii::t('main', 'Company name'),
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

    public function save(){
        $model = new CompanySignup();
        $model->name = $this->name;
        $model->director = $this->director;
        $model->phone = $this->phone;
        $model->email = $this->email;
        $model->fax = $this->fax;
        $model->region = $this->region;
        $model->district = $this->district;
        $model->address = $this->address;
        $model->index = $this->index;
        $model->product = $this->product;
        $model->file = $this->file;
        $model->mfo = $this->mfo;
        $model->inn = $this->inn;
        $model->okonx = $this->okonx;
        $model->rs = $this->rs;
        $model->opf = $this->opf;
        $model->fs = $this->fs;
        $model->soato = $this->soato;
        $model->okpo = $this->okpo;
        $model->text = $this->text;

        if($model->save()){
            return true;
        } else {
            return false;
        }
    }
}
