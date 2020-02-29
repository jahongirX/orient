<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "books_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $title
 * @property string $description
 */
class BooksLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'title', 'description'], 'required'],
            [['parent', 'lang'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'lang' => 'Lang',
            'title' => Yii::t('main','Title'),
            'description' => Yii::t('main','Description'),
        ];
    }
}
