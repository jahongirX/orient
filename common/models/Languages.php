<?php

namespace common\models;

use Yii;

class Languages extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'languages';
    }

    public function rules()
    {
        return [
            [['name', 'abb'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['abb'], 'string', 'max' => 5],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'abb' => Yii::t('main', 'Abb'),
            'status' => Yii::t('main', 'Status'),
        ];
    }
}
