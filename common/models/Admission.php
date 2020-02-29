<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admission".
 *
 * @property integer $id
 * @property integer $order_by
 * @property integer $status
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $site
 * @property string $image
 * @property string $blog
 * @property string $biography
 * @property string $fullName
 *
 * @property AdmissionLang[] $admissionLangs
 * @property Reception[] $receptions
 */
class Admission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'level_name'], 'required'],
            [['order_by', 'status'], 'integer'],
            [['name', 'level_name', 'phone', 'fax','email', 'image', 'site', 'blog', 'biography', 'reception_days'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'order_by' => Yii::t('main', 'Order By'),
            'status' => Yii::t('main', 'Status'),
            'phone' => Yii::t('main', 'Phone'),
            'fax' => Yii::t('main', 'Fax'),
            'email' => Yii::t('main', 'Email'),
            'site' => Yii::t('main', 'Site'),
            'image' => Yii::t('main', 'Image'),
            'blog' => Yii::t('main', 'Blog'),
            'biography' => Yii::t('main', 'Biography'),
            'level_name' => Yii::t('main', 'Level'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmissionLangs()
    {
        return $this->hasMany(AdmissionLang::className(), ['parent' => 'id']);
    }
 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceptions()
    {
        return $this->hasMany(Reception::className(), ['admissionId' => 'id']);
    }
 
    /**
     * @return string
     */
    public function getName()
    {
        $q = AdmissionLang::find()->select('name')->where(['parent' => $this->id,'lang' => Yii::$app->lang->id]);
        if ($q->exists()){
            $d = $q->one();
        } else {
            $d = AdmissionLang::find()->select('name')->where(['parent' => $this->id])->one();
        }
        return isset($d->name) ? $d->name : '';
    }

    /**
     * @return string
     */
    public function getLevel_name()
    {
        $q = AdmissionLang::find()->select('level_name')->where(['parent' => $this->id,'lang' => Yii::$app->lang->id]);
        if ($q->exists()){
            $d = $q->one();
        } else {
            $d = AdmissionLang::find()->select('level_name')->where(['parent' => $this->id])->one();
        }
        return isset($d->level_name) ? $d->level_name : '';
    }

    /**
     * @return string
     */
    public function getReception_days()
    {
        $q = AdmissionLang::find()->select('reception_days')->where(['parent' => $this->id,'lang' => Yii::$app->lang->id]);
        if ($q->exists()){
            $d = $q->one();
        } else {
            $d = AdmissionLang::find()->select('reception_days')->where(['parent' => $this->id])->one();
        }
        return isset($d->reception_days) ? $d->reception_days : '';
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->level_name .', ' .$this->name;
    }
}
