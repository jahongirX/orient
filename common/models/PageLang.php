<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $title
 * @property string $second_title
 * @property string $keywords
 * @property string $body
 * @property string $main_image
 */
class PageLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'title'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['body'], 'string'],
            [['title', 'second_title'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 300],
            [['main_image'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'second_title' => 'Second Title',
            'keywords' => 'Keywords',
            'body' => 'Body',
            'main_image' => 'Main Image',
        ];
    }
}
