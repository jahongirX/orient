<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "filial".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $description_uslugi
 * @property string $created_date
 * @property string $update_date
 * @property int $status
 * @property int $region_id
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['update_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function rules()
    {
        return [
            [['title', 'description', 'description_uslugi', 'status', 'region_id'], 'required'],
            [['description', 'description_uslugi'], 'string'],
            [['created_date', 'update_date'], 'safe'],
            [['status', 'region_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title_uslugi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'description_uslugi' => 'Description Uslugi',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
            'status' => 'Status',
            'region_id' => 'Region ID',
            'title_uslugi' => 'Title Uslugi',
        ];
    }
}
