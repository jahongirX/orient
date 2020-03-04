<?php

namespace common\models;

use common\components\Model;
use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "question_answer".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $category
 */
class QuestionAnswer extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'category'], 'required'],
            [['answer'], 'string'],
            [['category'], 'integer'],
            [['status'], 'safe'],
            [['question'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'category' => 'Category',
            'status' => 'Status'
        ];
    }

}
