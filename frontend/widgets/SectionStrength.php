<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:33
 */

namespace frontend\widgets;


use common\models\Benefits;
use yii\base\Widget;

class SectionStrength extends Widget
{
    public function run()
    {
        $models = Benefits::find()->where(['status'=>1])->limit(6)->all();
       return $this->render('SectionStrength',[
           'models' => $models
       ]);
    }
}