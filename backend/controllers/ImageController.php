<?php

namespace backend\controllers;

use Yii;
use common\models\Image;
use common\models\ImageSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use common\components\StaticFunctions;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller
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
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for ($i = 0; $i < count($items) - 1; $i++) {
                if($items[$i] != null)
                    Image::findOne($items[$i])->delete();
            }
        }

        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Image model.
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
     * Creates a new Image model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()))
        {
            $images = UploadedFile::getInstances($model, 'upload_images');
            if($images){
                foreach ($images as $item){
                    $image = new Image();
                    $image->status = 1;
                    $image->creator = Yii::$app->user->getId();
                    $image->created_date = date('y-m-d');
                    $image->album = $model->album;
                    $image->name = $item->name;
                    $image->extension = $item->extension;
                    $image->size = $item->size;
                    $image->guid =  StaticFunctions::saveImage($item, $model->album,'album');
                    if($image->save()){

                    }else {
                        return print_r($image->errors);
                    }
                }
            }
            return $this->referrer();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save())
            {
                return $this->redirect(['update', 'id' => $model->id]);
            } else
                return print_r($model->errors,true);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Image model.
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
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDropzoneUpload()
    {
        $files = \yii\web\UploadedFile::getInstancesByName('file');

        foreach ($files as $file)
        {
            $model = new Image();

            $model->creator = Yii::$app->user->id;
            $model->created_date = date('Y-m-d H:i:s');
            $model->status = 1;

            $model->name = $file->baseName;
            $model->size = $file->size;
            $model->extension = $file->extension;
            $model->album = Yii::$app->request->post()['album_id'];
            $model->save(false);

            $model->guid = StaticFunctions::saveImage($file, $model->id, 'image');
            $model->save();

        }

        Yii::$app->session->setFlash('upload_success',"1");

        return true;

    }
}
