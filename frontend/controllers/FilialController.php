<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.03.2020
 * Time: 9:11
 */

namespace frontend\controllers;


use common\components\Controller;
use common\models\Filial;
use Yii;

class FilialController extends Controller
{
    public function actionViewAll() {

//        if(Yii::$app->language == Yii::$app->params['main_language'])
//        {
//
//
//        } else {
//
//            $lang = Yii::$app->language;
//            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
//            $models = News::find()->leftJoin('news_lang', 'news.id=news_lang.parent')->where('news_lang.status=1 AND news_lang.lang=' . $id)->orderBy(['id' => SORT_DESC]);
//
//        }

        $models = Filial::find()->where(['status' => 1])->all();

        return $this->render('view-all', [
            'models' => $models,
        ]);
    }
    public function actionView($id) {

        $model = Filial::findOne($id);

        if( $model )
        {
//            $model->seen_count ++;
            $model->save();

            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->referrer();

    }
}