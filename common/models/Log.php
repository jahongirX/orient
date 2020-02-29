<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property integer $id
 * @property integer $user
 * @property string $action
 * @property integer $time
 * @property integer $action_type
 * @property string $action_id
 *
 * @property User $user0
 */
class Log extends \yii\db\ActiveRecord
{
    const ADMISSION_TYPE = 1;
    const ALBUM_TYPE = 2;
    const POLL_TYPE = 3;
    const ATTACH_TYPE = 4;
    const SETTINGS_TYPE = 5;
    const MENU_TYPE = 6;
    const USER_TYPE = 7;
    const DISTRICT_TYPE = 8;
    const LANGUAGE_TYPE = 9;
    const IMAGE_TYPE = 10;
    const FAQ_TYPE = 11;
    const POST_TYPE = 12;
    const REGION_TYPE = 13;
    const COMPANY_TYPE = 14;
    const POST_CATEGORY_TYPE = 15;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'action', 'time', 'action_type', 'action_id'], 'required'],
            [['user', 'time', 'action_type'], 'integer'],
            [['action'], 'string', 'max' => 1000],
            [['action_id'], 'string', 'max' => 100],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'user' => Yii::t('main', 'User ID'),
            'action' => Yii::t('main', 'Action'),
            'time' => Yii::t('main', 'Time'),
            'action_type' => Yii::t('main', 'Action Type'),
            'action_id' => Yii::t('main', 'Action ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
