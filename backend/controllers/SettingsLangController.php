<?php

namespace backend\controllers;

use common\components\StaticFunctions;
use Yii;
use common\models\SettingsLang;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SettingsLangController implements the CRUD actions for SettingsLang model.
 */
class SettingsLangController extends Controller
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
     * Creates a new SettingsLang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SettingsLang();

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->set('tab', $model->lang);

            if($model->parent == 'logo' || $model->parent == 'mini_rectangle_banner' || $model->parent == 'mobile_logo' || $model->parent == 'mini_square_banner') {
                $file = UploadedFile::getInstance($model, 'val');
                $model->val = StaticFunctions::saveImage($file, $model->id, 'settings');
            }

            if($model->save())
                return $this->referrer();
            else
                return print_r($model->errors);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SettingsLang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $val = $model->val;
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->set('tab', $model->lang);

            if($model->parent == 'logo' || $model->parent == 'mini_rectangle_banner' || $model->parent == 'mobile_logo' || $model->parent == 'mini_square_banner') {
                $file = UploadedFile::getInstance($model, 'val');
                if(empty($file)) {
                    $model->val = $val;
                } else {
                    $model->val = StaticFunctions::saveImage($file, $model->id, 'settings');
                    StaticFunctions::deleteImage($val, $model->id, 'settings');
                }
            }

            if($model->save())
                return $this->referrer();
            else
                return print_r($model->errors);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SettingsLang model.
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
     * Finds the SettingsLang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SettingsLang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SettingsLang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
