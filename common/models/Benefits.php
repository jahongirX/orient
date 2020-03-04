<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benefits".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 */
class Benefits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benefits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'img'], 'string', 'max' => 255],
            [['status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'status' => 'Status',
        ];
    }
}
