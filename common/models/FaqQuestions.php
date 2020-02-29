<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "faq_questions".
 *
 * @property integer $id
 * @property string $name
 * @property string $question
 * @property integer $created_date
 */
class FaqQuestions extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $captcha;
    public static function tableName()
    {
        return 'faq_questions';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['created_date'],

                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question'], 'required'],
            [['question'], 'string'],
            [['created_date'], 'integer'],
            [['email'],'email'],
            [['name'], 'string', 'max' => 100],
            [['captcha'],'captcha']
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
            'email' => Yii::t('main', 'Email'),
            'question' => Yii::t('main', 'Question'),
            'captcha'=>Yii::t('main','Captcha'),
            'created_date' => Yii::t('main', 'Created Date'),
        ];
    }
}
