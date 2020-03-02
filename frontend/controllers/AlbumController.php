<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Album;
use common\models\Image;
use Yii;

class AlbumController extends Controller
{

    public function actionIndex()
    {

        $models = Album::find()->where(['status' => 1]);

        $pagination = new \yii\data\Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 8,
        ]);

        $models = $models->offset($pagination->offset)->limit($pagination->limit)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', [
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function actionView($id) {

        $album = Album::findOne($id);

        if($album) {
            $album->seen_count++;
            $album->save();

            $models = Image::find()->where('status=1 AND album=' . $id)->orderBy(['id' => SORT_DESC]);

            $pagination = new \yii\data\Pagination([
                'totalCount' => $models->count(),
                'pageSize' => 8,
            ]);

            $models = $models->offset($pagination->offset)->limit($pagination->limit)->orderBy(['id' => SORT_DESC])->all();

            return $this->render('view', [
                'album' => $album,
                'models' => $models,
                'pagination' => $pagination
            ]);
        }

        return $this->referrer();
    }

}
