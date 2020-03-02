<?php

namespace backend\controllers;

use backend\models\Message;
use Yii;
use backend\models\SourceMessage;
use backend\models\SourceMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SourceMessageController implements the CRUD actions for SourceMessage model.
 */
class SourceMessageController extends Controller
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
     * Lists all SourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){

            $model = new SourceMessage();
            $model->category = 'main';
            $model->message = Yii::$app->request->post()['newWord'];
            $model->save();

            $model_en = new Message();
            $model_en->id = $model->id;
            $model_en->language = 'en';
            $model_en->translation = Yii::$app->request->post()['en'];
            $model_en->save();

            $model_ru = new Message();
            $model_ru->id = $model->id;
            $model_ru->language = 'ru';
            $model_ru->translation = Yii::$app->request->post()['ru'];
            $model_ru->save();

            $model_uz = new Message();
            $model_uz->id = $model->id;
            $model_uz->language = 'uz';
            $model_uz->translation = Yii::$app->request->post()['uz'];
            $model_uz->save();

        }

        $searchModel = new SourceMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SourceMessage model.
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
     * Creates a new SourceMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SourceMessage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionSave($id)
    {
        if(Yii::$app->request->post()) {

            $model = Message::findOne(['id' => $id, 'language' => 'ru']);
            $model->translation = Yii::$app->request->post()['ru'];
            $model->save();

            $model = Message::findOne(['id' => $id, 'language' => 'uz']);
            $model->translation = Yii::$app->request->post()['uz'];
            $model->save();

            $model = Message::findOne(['id' => $id, 'language' => 'en']);
            $model->translation = Yii::$app->request->post()['en'];
            $model->save();

            $model = SourceMessage::findOne($id);
            $model->message = Yii::$app->request->post()['source_message'];
            $model->save();
        }
        return $this->redirect('/source-message/index');
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SourceMessage model.
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
     * Finds the SourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SourceMessage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
