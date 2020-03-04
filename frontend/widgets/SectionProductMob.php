<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:19
 */

namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class SectionProductMob extends Widget
{
    public function run()
    {
        $models = Product::find()->where(['status'=>1])->all();
        return $this->render('SectionProductMob',[
            'models' => $models
        ]);
    }
}