<?php


namespace frontend\widgets;


use yii\base\Widget;

class Testimonials extends Widget
{
    public function run()
    {
        $models = \common\models\Testimonials::find()->where(['status'=>1])->limit(8)->orderBy(['date'=>SORT_ASC])->all();
        return $this->render('testimonials',[
            'models' => $models
        ]);
    }
}