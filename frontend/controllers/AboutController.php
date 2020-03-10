<?php


namespace frontend\controllers;

use common\components\Controller;
use common\models\About;
use common\models\Languages;
use common\models\News;
use Yii;

class AboutController extends Controller
{
    public function actionView() {


        $models = About::find()->where(['status' => 1])->orderBy(['created_date' => SORT_DESC]);


        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 4 ,
        ]);

        $models = $models->offset($pagination->offset)->limit(4)->all();

        return $this->render('view', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }
}