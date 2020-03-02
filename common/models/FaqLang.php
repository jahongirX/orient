<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $question
 * @property string $anons
 * @property string $answer
 */
class FaqLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'question', 'answer'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['answer'], 'string'],
            [['question'], 'string', 'max' => 200],
            [['anons'], 'string', 'max' => 600],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'question' => Yii::t('main', 'Question'),
            'answer' => Yii::t('main', 'Answer'),
            'anons' => Yii::t('main', 'Anons'),
        ];
    }
}
