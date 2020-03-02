<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Page;

class PageController extends Controller
{
    public function actionView($id)
    {
        $model = Page::find()->where(['id'=>$id])->one();

        return $this->render('view',[
            'model'=>$model
        ]);
    }
}