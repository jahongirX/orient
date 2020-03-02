<?php

namespace backend\controllers;

use Yii;
use common\models\PostLang;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;


class PostLangController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {

        $model = new PostLang();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {

            Yii::$app->session->set('tab', $model->lang);

            $image = UploadedFile::getInstance($model,'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->parent);
            }

            if($model->save())
            {
                return $this->referrer();
            } else
                return print_r($model->errors);

        }

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $image_old = $model->main_image;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->set('tab', $model->lang);

            $image = UploadedFile::getInstance($model,'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->parent);
                StaticFunctions::deleteImage($image_old, $model->parent);

            } else {

                $model->main_image = $image_old;

            }

            if($model->save())
            {
                return $this->referrer();
            }

        }
    }

    protected function findModel($id)
    {
        if (($model = PostLang::findOne($id)) !== null)
        {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
