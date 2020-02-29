<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property integer $status
 */
class Partner extends \common\components\Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link'], 'string'],
            [['status'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'title' => Yii::t('main', 'Title'),
            'link' => Yii::t('main', 'Link'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
