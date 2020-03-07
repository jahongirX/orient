<?php

namespace app\models;

use Yii;

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
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'main_image', 'info', 'status'], 'required'],
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
