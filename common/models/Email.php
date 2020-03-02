<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property string $email
 * @property string $created_date
 * @property integer $status
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'created_date'], 'required'],
            [['created_date'], 'safe'],
            [['status'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'email' => Yii::t('main', 'Email'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
