<?php

namespace backend\controllers;
use yii\web\UploadedFile;
use Yii;
use common\models\Testimonials;
use common\models\TestimonialsSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\StaticFunctions;
/**
 * TestimonialsController implements the CRUD actions for Testimonials model.
 */
class TestimonialsController extends Controller
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
     * Lists all Testimonials models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                    Testimonials::findOne($items[$i])->delete();
            }
        }
        
        $searchModel = new TestimonialsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testimonials model.
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
     * Creates a new Testimonials model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimonials();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()) ) {
            
            $image = UploadedFile::getInstance($model, 'image');
		
			if($image)
			{
			
			$model->image = StaticFunctions::saveImage($image, $model->id,'testimonials');
			
			    
			}
			
			$model->save();
            
            return $this->redirect(['update', 'id' => $model->id]);
        
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Testimonials model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       
        $image_old = $model->image;
        
        if ($model->load(Yii::$app->request->post())) {
            
             $image = UploadedFile::getInstance($model,'image');
             
              if($image)
            {
                $model->image = StaticFunctions::saveImage($image, $model->id,'testimonials');
                
                StaticFunctions::deleteImage($image_old, $model->id);

            } else {

                $model->image = $image_old;

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
     * Deletes an existing Testimonials model.
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
     * Finds the Testimonials model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Testimonials the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimonials::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionStatusOff($id)
    {

        $model = $this->findModel($id);

        if(Yii::$app->request->get('id'))
        {
           $model->status = 0;
           if($model->save()){
               return $this->referrer();
           }
        }else{
            return $this->redirect('testimonials/index');
        }    
    }
    
    public function actionStatusOn($id)
    {

        $model = $this->findModel($id);

        if(Yii::$app->request->get('id'))
        {
           $model->status = 1;
           if($model->save()){
               return $this->referrer();
           }
        }else{
            return $this->redirect('testimonials/index');
        }    
    }
    
}
