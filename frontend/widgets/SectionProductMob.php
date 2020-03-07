<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:19
 */

namespace frontend\widgets;


use common\models\Product;
use common\models\ProductCategory;
use yii\base\Widget;

class SectionProductMob extends Widget
{
    public function run()
    {
        $models = ProductCategory::find()->all();
        return $this->render('SectionProductMob',[
            'models' => $models
        ]);
    }
}