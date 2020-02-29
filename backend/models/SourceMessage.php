<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%source_message}}".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category' => Yii::t('main', 'Category'),
            'message' => Yii::t('main', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEn()
    {
        return $this->hasOne(Message::className(), ['id' => 'id'])->andWhere(['language' => 'en']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRu()
    {
        return $this->hasOne(Message::className(), ['id' => 'id'])->andWhere(['language' => 'ru']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUz()
    {
        return $this->hasOne(Message::className(), ['id' => 'id'])->andWhere(['language' => 'uz']);
    }
}
