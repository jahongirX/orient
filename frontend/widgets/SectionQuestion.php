<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:39
 */

namespace frontend\widgets;


use common\models\QuestionAnswer;
use common\models\QuestionCategory;
use yii\base\Widget;

class SectionQuestion extends Widget
{
    public function run()
    {

        $models = QuestionCategory::find()->where(['status'=>1])->all();
//        $question_answer = QuestionAnswer::find()->where(['status'=>1])->all();
       return $this->render('SectionQuestion',[
//           'question_answers' => $question_answer,
           'models' => $models
       ]);
    }
}