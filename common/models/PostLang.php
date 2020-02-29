<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $title
 * @property string $second_title
 * @property string $anons
 * @property string $body
 */
class PostLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'title'], 'required'],
            [['lang', 'parent', 'status'], 'integer'],
            [['title', 'second_title'], 'string', 'max' => 100],
            [['anons'], 'string', 'max' => 300],
            [['body'], 'string' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'lang' => Yii::t('main', 'Lang'),
            'parent' => Yii::t('main', 'Parent'),
            'title' => Yii::t('main', 'Title'),
            'second_title' => Yii::t('main', 'Second Title'),
            'anons' => Yii::t('main', 'Anons'),
            'body' => Yii::t('main', 'Body'),
        ];
    }
}
