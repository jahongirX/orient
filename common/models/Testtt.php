<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testtt".
 *
 * @property integer $id
 * @property string $name
 * @property string $fame
 * @property string $shame
 */
class Testtt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testtt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'fame', 'shame'], 'required'],
            [['name', 'fame', 'shame'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'fame' => 'Fame',
            'shame' => 'Shame',
        ];
    }
}
