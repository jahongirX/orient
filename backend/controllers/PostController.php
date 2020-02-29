<?php

namespace backend\controllers;

use Yii;
use common\components\Controller;
use yii\filters\VerbFilter;
use common\models\Post;
use common\models\PostSearch;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
use common\models\Attach;

class PostController extends Controller
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
                    Post::findOne($items[$i])->delete();
            }
        }

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Post();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            $model->category = implode(",",$_POST['Post']['category']);
            $model->creator = Yii::$app->user->id;

            if($model->save())
            {
                if(isset($_FILES)) {
                    $files = UploadedFile::getInstancesByName('file');
                    $this->saveFiles($files,Attach::POST,$model->id);
                }
				$image = UploadedFile::getInstance($model, 'main_image');
				if($image)
				{
					$model->main_image = StaticFunctions::saveImage($image, $model->id);
				}
				
				$model->save();
				
                return $this->redirect(['update', 'id' => $model->id]);
            } else
                return print_r($model->errors,true);

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);

        }

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image_old = $model->main_image;
        //$model->category = explode(',', $model->category);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
//            if($model->category)
//                $model->category = implode(",", $_POST['Post']['category']);

            $image = UploadedFile::getInstance($model,'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->id);
                StaticFunctions::deleteImage($image_old, $model->id);

            } else {

                $model->main_image = $image_old;

            }

            if($model->save())
            {
                if(isset($_FILES)) {
                    $files = UploadedFile::getInstancesByName('file');
                    $this->saveFiles($files,Attach::POST,$model->id);
                }
                return $this->redirect(['update', 'id' => $model->id]);
            }

        } else {

            return $this->render('update', [
                'model' => $model,

            ]);

        }

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            $this->findModel($id)->delete();
        }
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveFiles($files, $section, $parent) {
        foreach($files as $file) {
            $ext = $file->extension == 'php' || $file->extension == 'js' ? 'file' : $file->extension;
            $guid = md5(Yii::$app->user->id.time().$file->name.rand(1,1000000).rand(1,1000000));
            $dir = realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['attach_dir'];
            $filename = $guid.'.'.$file->extension;
            $file->saveAs($dir.$filename);
            $model = new Attach();
            $model->section = $section;
            $model->parent = $parent;
            $model->name = $file->name;
            $model->guid = $guid;
            $model->size = $file->size;
            $model->extension = $ext;
            $model->created_date = date('Y-m-d H:i:s');
            $model->creator = Yii::$app->user->id;
            $model->status = 1;
            $model->save();

        }
    }

}