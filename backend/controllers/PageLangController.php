<?php

namespace backend\controllers;

use Yii;
use common\models\PageLang;
use common\models\PageLangSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
/**
 * PageLangController implements the CRUD actions for PageLang model.
 */
class PageLangController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Creates a new PageLang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageLang();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->set('tab', $model->lang);
            $image = UploadedFile::getInstance($model,'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->parent, 'page');
            }

            if($model->save())
            {
                return $this->referrer();
            } else
                return print_r($model->errors);

        }
    }

    /**
     * Updates an existing PageLang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
                $model->main_image = StaticFunctions::saveImage($image, $model->parent, 'page');
                StaticFunctions::deleteImage($image_old, $model->parent, 'page');

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
        if (($model = PageLang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
