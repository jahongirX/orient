<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsLang;
use common\models\Languages;
use Yii;
use yii\data\ActiveDataProvider;

class NewsController extends Controller {

    public function actionView($id) {

        $model = News::findOne($id);

        if( $model )
        {
            $model->seen_count ++;
            $model->save();

            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->referrer();

    }

    public function actionByCat($id)
    {

        if($category = NewsCategory::findOne($id))
        {
            if(Yii::$app->language == Yii::$app->params['main_language'])
            {
                $models = News::find()->where( 'status=1 AND category=' . $id )->orderBy(['id' => SORT_DESC]);

            } else {

                $lang = Yii::$app->language;
                $langid = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
                $models = News::find()->leftJoin('news_lang', 'news.id=news_lang.parent')->where('news_lang.status=1 AND news_lang.lang=' . $langid . ' AND category=' . $id )->orderBy(['news.id' => SORT_DESC]);

            }

            $pagination = new \yii\data\Pagination([
                'totalCount' => $models->count(),
                'pageSize' => 10,
            ]);

            $models = $models->offset($pagination->offset)->limit(10)->all();

            return $this->render('byCat', [
                'category' => $category,
                'models' => $models,
                'pagination' => $pagination
            ]);

        }

        return $this->referrer();

    }

    public function actionViewAll() {

        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = News::find()->where('status=1')->orderBy(['event_date' => SORT_DESC]);

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = News::find()->leftJoin('news_lang', 'news.id=news_lang.parent')->where('news_lang.status=1 AND news_lang.lang=' . $id)->orderBy(['id' => SORT_DESC]);

        }

        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 12,
        ]);

        $models = $models->offset($pagination->offset)->limit(12)->all();

        return $this->render('view-all', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function actionPrint($id) {

        if($model = News::findOne($id))
        {
            $this->layout = 'print';

            return $this->render('print',[
                'model' => $model
            ]);
        }

        return $this->referrer();
    }

}
