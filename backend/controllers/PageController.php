<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
use common\models\Attach;
/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                    Page::findOne($items[$i])->delete();
            }
        }
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            $model->creator = Yii::$app->user->id;
            $image = UploadedFile::getInstance($model, 'main_image');

            if($model->save())
            {
                if(isset($_FILES)) {
                    $files = UploadedFile::getInstancesByName('file');
                    $this->saveFiles($files,Attach::POST,$model->id);
                }
				if($image)
				{
					$model->main_image = StaticFunctions::saveImage($image, $model->id, 'page');
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

    /**
     * Updates an existing Page model.
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
            if(isset($_FILES)) {
                $files = UploadedFile::getInstancesByName('file');
                $this->saveFiles($files,Attach::POST,$model->id);
            }
            $image = UploadedFile::getInstance($model,'main_image');

            if($image)
            {
                $model->main_image = StaticFunctions::saveImage($image, $model->id, 'page');
                StaticFunctions::deleteImage($image_old, $model->id, 'page');

            } else {

                $model->main_image = $image_old;

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

    /**
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
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
