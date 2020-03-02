<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guests}}".
 *
 * @property integer $id
 * @property string $identity
 * @property integer $lastdate
 *
 * @property PollData[] $pollDatas
 */
class Guests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%guests}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identity', 'lastdate'], 'required'],
            [['lastdate'], 'integer'],
            [['identity'], 'string', 'max' => 96],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'identity' => Yii::t('main', 'Identity'),
            'lastdate' => Yii::t('main', 'Lastdate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollDatas()
    {
        return $this->hasMany(PollData::className(), ['user' => 'id']);
    }
}
