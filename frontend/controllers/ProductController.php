<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Languages;
use common\models\News;
use common\models\Product;
use common\models\ProductCategory;
use Yii;

class ProductController extends Controller
{
    public function actionView($id) {

        $model = Product::findOne($id);

        if( $model )
        {
//            $model->seen_count ++;
            $model->save();
            $categories = ProductCategory::find()->all();
            $products  = Product::find()->where(['status'=>1])->all();
            return $this->render('view', [
                'model' => $model,
                'categories' => $categories,
                'products' => $products
            ]);
        }

        return $this->referrer();

    }

    public function actionCatalog() {


        $models = Product::find()->where(['status' => 1]);
        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 3,
        ]);

        $models = $models->offset($pagination->offset)->limit(3)->all();

        return $this->render('catalog', [
            'models' => $models,
//            'pagination' => $pagination
        ]);
    }
}