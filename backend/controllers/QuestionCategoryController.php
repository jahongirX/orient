<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use common\models\Attach;
use Yii;
use common\models\QuestionCategory;
use common\models\QuestionCategorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;
use yii\web\UploadedFile;

class QuestionCategoryController extends Controller
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
                QuestionCategory::findOne($items[$i])->delete();
            }
        }

        $searchModel = new QuestionCategorySearch();
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
        $model = new QuestionCategory();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'img');

            if ($model->save()) {
                if (isset($_FILES)) {
                    $files = UploadedFile::getInstancesByName('file');
                    $this->saveFiles($files, Attach::POST, $model->id);
                }

                if ($image) {
                    $model->img = StaticFunctions::saveImage($image, $model->id, 'question-category');
                    $model->save();
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    return print_r($model->errors, true);
                    die();
                }


            } else {
                return print_r($model->errors, true);
            }

        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image_old = $model->img;

        if ($model->load(Yii::$app->request->post()))
        {
            if(isset($_FILES)) {
                $files = UploadedFile::getInstancesByName('file');
                $this->saveFiles($files,Attach::POST,$model->id);
            }
            $image = UploadedFile::getInstance($model,'img');

            if($image)
            {
                $model->img = StaticFunctions::saveImage($image, $model->id, 'question-category');
                StaticFunctions::deleteImage($image_old, $model->id, 'question-category');

            } else {

                $model->img = $image_old;

            }

            if($model->save())
            {
                return $this->redirect(['update', 'id' => $model->id]);
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
        if (($model = QuestionCategory::findOne($id)) !== null) {
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
