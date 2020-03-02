<?php

namespace backend\controllers;

use Yii;
use common\models\ProductLang;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;


class ProductLangController extends Controller
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

        $model = new ProductLang();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->session->set('tab', $model->lang);

            $image = UploadedFile::getInstance($model,'image');

            if($image)
            {
                $model->image = StaticFunctions::saveImage($image, $model->parent, 'product');
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
        $image_old = $model->image;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->set('tab', $model->lang);

            $image = UploadedFile::getInstance($model,'image');

            if($image)
            {
                $model->image = StaticFunctions::saveImage($image, $model->parent, 'product');
                StaticFunctions::deleteImage($image_old, $model->parent);

            } else {

                $model->image = $image_old;

            }

            if($model->save())
            {
                return $this->referrer();
            }

        }
    }

    protected function findModel($id)
    {
        if (($model = ProductLang::findOne($id)) !== null)
        {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
