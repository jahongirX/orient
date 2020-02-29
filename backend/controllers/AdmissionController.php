<?php

namespace backend\controllers;

use Yii;
use backend\models\AdmissionForm;
use common\models\AdmissionLang;
use common\models\Admission;
use common\models\AdmissionSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\StaticFunctions;
use yii\web\UploadedFile;

/**
 * AdmissionController implements the CRUD actions for Admission model.
 */
class AdmissionController extends Controller
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

    public function actionIndex()
    {

        if(Yii::$app->request->post())
        {
            $items = Yii::$app->request->post()['del_input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++)
            {
                if($items[$i] != null)
                    Admission::findOne($items[$i])->delete();
            }
        }
        $searchModel = new AdmissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

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
        $model = new Admission();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'image');

            if($model->save()){

                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'admission');
                }

                $model->save();

                return $this->redirect(['update', 'id' => $model->id]);


            } else {

                return print_r($model->errors,true);

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

        $image_old = $model->image;

        if ($model->load(Yii::$app->request->post()))
        {

            if($model->save())
            {
                $image = UploadedFile::getInstance($model,'image');

                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'admission');
                    StaticFunctions::deleteImage($image_old, $model->id);

                } else {

                    $model->image = $image_old;

                }

                $model->save();

                return $this->redirect(['update', 'id' => $model->id]);

            }else{

                return print_r($model->errors,true);

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
        if (($model = Admission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
