<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:08
 */

namespace frontend\widgets;


use common\models\Product;
use common\models\ProductCategory;
use yii\base\Widget;

class SectionProduct extends Widget
{
    public function run()
    {
        $models = ProductCategory::find()->all();
        $products  = Product::find()->where(['status'=>1])->all();
        return $this->render('SectionProduct',[
            'models' => $models,
            'products' => $products
        ]);
    }
}