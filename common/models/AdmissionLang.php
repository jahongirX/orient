<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admission_lang".
 *
 * @property integer $id
 * @property integer $admission_id
 * @property integer $language_id
 * @property string $name
 * @property string $level_name
 * @property string $reception_days
 *
 * @property Admission $admission
 * @property Languages $language
 */
class AdmissionLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admission_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'name', 'level_name'], 'required'],
            [['parent', 'lang'], 'integer'],
            [['name', 'level_name'], 'string', 'max' => 256],
            [['reception_days'], 'string', 'max' => 500],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Admission::className(), 'targetAttribute' => ['parent' => 'id']],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'parent' => Yii::t('main', 'Admission ID'),
            'lang' => Yii::t('main', 'Language ID'),
            'name' => Yii::t('main', 'Name'),
            'level_name' => Yii::t('main', 'Level'),
            'reception_days' => Yii::t('main', 'Reception Days'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmission()
    {
        return $this->hasOne(Admission::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang']);
    }
}
