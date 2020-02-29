<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $creator
 * @property integer $time
 *
 * @property PollData[] $pollDatas
 * @property PollLang[] $pollLangs
 * @property PollOptions[] $pollOptions
 * @property User $creator0
 */
class Polls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'creator', 'time'], 'required'],
            [['status', 'creator', 'time'], 'integer'],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'status' => Yii::t('main', 'Status'),
            'creator' => Yii::t('main', 'Creator'),
            'time' => Yii::t('main', 'Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollDatas()
    {
        return $this->hasMany(PollData::className(), ['poll' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollLangs()
    {
        return $this->hasMany(PollLang::className(), ['poll' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollOptions()
    {
        return $this->hasMany(PollOptions::className(), ['poll' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }
}
