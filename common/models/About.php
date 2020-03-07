<?php

namespace common\models;

use common\components\Model;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property string $info
 * @property string $created_date
 * @property string $updated_date
 * @property int $status
 */
class About extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['updated_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'info', 'status'], 'required'],
            [['info'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['status'], 'integer'],
            [['title', 'main_image'], 'string', 'max' => 255],
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
            'main_image' => 'Main Image',
            'info' => 'Info',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }
}
