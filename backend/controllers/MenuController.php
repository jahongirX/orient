<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use common\models\MenuSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                    Menu::findOne($items[$i])->delete();
            }
        }
        $searchModel = new MenuSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if($model->save())
            {
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
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

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
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionParents($id) {
        $models = Menu::getLangModels('parent is null AND type='.$id);
        echo "<option value>".Yii::t('main','Нет')."</option>";
        foreach($models as $model)
        {
            echo "<option value='".$model['id']."'>".$model['name']."</option>";
        }
    }

    private function getMenuItems($type, &$out, $id=0, $pn=''){
        if($id == 0)
            $items = Menu::find()->where(['type' => $type, 'parent' => null])->all();
        else
            $items = Menu::find()->where(['parent' => $id, 'type' => $type])->all();
        foreach ($items as $item) {
            if($pn){
                $pn2 = $pn . ' / ' . $item->title;
                $out[] = ['id' => $item->id, 'name' => $pn2];
            } else {
                $pn2 = $item->title;
                $out[] = ['id' => $item->id, 'name' => $item->title];
            }
            if (Menu::find()->where(['parent' => $item->id])->exists()){
                $this->getMenuItems($type, $out, $item->id, $pn2);
            }
        }
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $menus = Menu::getLangModels('type='.$cat_id.' AND parent is null');
                $this->getMenuItems($cat_id, $out);
                return Json::encode(['output'=>$out, 'selected'=>'']);

            }
        }
        return Json::encode(['output'=>'', 'selected'=>'']);
    }

    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
