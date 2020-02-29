<?php

namespace backend\controllers;

use Yii;
use common\models\ServiceRequestSubjectLang;
use common\models\ServiceRequestSubjectLangSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;

class ServiceRequestSubjectLangController extends Controller
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


    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                ServiceRequestSubjectLang::findOne($items[$i])->delete();
            }
        }

        $searchModel = new ServiceRequestSubjectLangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new ServiceRequestSubjectLang();

        Yii::$app->session->set('tab', $model->lang);

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){

                return $this->referrer();

            }else{

                return print_r($model->errors);

            }

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if($model->save())
            {
                Yii::$app->session->set('tab', $model->lang);

                return $this->referrer();

            }else{

                return print_r($model->errors);

            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = ServiceRequestSubjectLang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
