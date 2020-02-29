<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Post;
use common\models\PostCategory;
use common\models\Languages;
use common\models\Advertise;
use Yii;
use yii\data\ActiveDataProvider;

class PostController extends Controller
{

    public function actionView($id)
    {

        $model = Post::findOne($id);

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

    public function actionCategory($id)
    {

        if($category = PostCategory::findOne($id))
        {
            if(Yii::$app->language == Yii::$app->params['main_language'])
            {
                $models = Post::find()->where( 'status=1 AND category=' . $id )->orderBy(['id' => SORT_DESC]);

            } else {

                $lang = Yii::$app->language;
                $langid = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
                $models = Post::find()->leftJoin('post_lang', 'post.id=post_lang.parent')->where('post_lang.status=1 AND post_lang.lang=' . $langid . ' AND category=' . $id )->orderBy(['post.id' => SORT_DESC]);

            }

            $pagination = new \yii\data\Pagination([
                'totalCount' => $models->count(),
                'pageSize' => 10,
            ]);

            $models = $models->offset($pagination->offset)->limit(10)->all();

            return $this->render('category', [
                'category' => $category,
                'models' => $models,
                'pagination' => $pagination
            ]);

        }

        return $this->referrer();

    }

    public function actionViewAll()
    {
        if(Yii::$app->language == Yii::$app->params['main_language']) 
        {
            $models = Post::find()->where('status=1')->orderBy(['id' => SORT_DESC]);

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = Post::find()->leftJoin('post_lang', 'post.id=post_lang.parent')->where('post_lang.status=1 AND post_lang.lang=' . $id)->orderBy(['post.id' => SORT_DESC]);

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

        if($model = Post::findOne($id))
        {
            $this->layout = 'print';

            return $this->render('print',[
                'model' => $model
            ]);
        }

        return $this->referrer();
    }

}
