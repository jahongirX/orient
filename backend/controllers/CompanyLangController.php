<?php

namespace backend\controllers;

use Yii;
use common\models\CompanyLang;
use common\models\CompanyLangSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;

class CompanyLangController extends Controller
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
     * Lists all CompanyLang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanyLangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanyLang model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CompanyLang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompanyLang();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->set('tab', $model->lang);

            $icon = UploadedFile::getInstance($model, 'icon');

            if($icon)
            {
                $model->icon = StaticFunctions::saveImage($icon, $model->parent, 'company');
            }

            if($model->save())
            {
                return $this->referrer();
            } else
                return print_r($model->errors);

        }
    }

    /**
     * Updates an existing CompanyLang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $icon_old = $model->icon;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->set('tab', $model->lang);

            $icon = UploadedFile::getInstance($model, 'icon');

            if($icon)
            {
                $model->icon = StaticFunctions::saveImage($icon, $model->parent, 'company');

                StaticFunctions::deleteImage($icon_old, $model->parent, 'company');

            } else {

                $model->icon = $icon_old;

            }

            if($model->save())
            {
                return $this->referrer();
            }

        }
    }

    /**
     * Deletes an existing CompanyLang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CompanyLang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CompanyLang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CompanyLang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
