<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use Yii;
use common\models\Books;
use common\models\BooksSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
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
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                Books::findOne($items[$i])->delete();
            }
        }

        $models = Books::find()->where(['id'=>13])->all();
//        echo "<pre>";
//        print_r($models);die;

        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
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
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Books();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'image');
            $file =  UploadedFile::getInstance($model, 'file');

            if($model->save()){

                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'books');
                }

                if($file){
                    $model->file = StaticFunctions::saveFile($file, $model->id, 'books');
                }

                $model->save();

                return $this->redirect(['update', 'id' => $model->id]);


            } else {

                return print_r($model->errors, true);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $image_old = $model->image;

        $file_old = $model->file;

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){

                $image = UploadedFile::getInstance($model,'image');
                $file =  UploadedFile::getInstance($model, 'file');

                if($image)
                {
                    $model->image = StaticFunctions::saveImage($image, $model->id, 'books');
                    StaticFunctions::deleteImage($image_old, $model->id,'books');

                } else {

                    $model->image = $image_old;

                }

                if($file){
                    $model->file = StaticFunctions::saveFile($file, $model->id, 'books');
                    StaticFunctions::deleteFile($file_old, $model->id,'books');

                } else {

                    $model->file = $file_old;
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

    /**
     * Deletes an existing Books model.
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
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
