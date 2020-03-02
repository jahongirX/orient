<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonials_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $name
 * @property string $message
 * @property string $position
 */
class TestimonialsLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonials_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'name', 'message', 'position'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['message'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['position'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'parent' => 'Parent',
            'name' => 'Name',
            'message' => 'Message',
            'position' => 'Position',
        ];
    }
}
