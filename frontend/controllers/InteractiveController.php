<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.10.2018
 * Time: 9:24
 */

namespace frontend\controllers;


use common\components\Controller;
use common\components\StaticFunctions;
use common\models\District;
use common\models\Dormitory;
use Yii;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class InteractiveController extends Controller
{
    public function actionDormitory(){
        $model = new Dormitory();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(Yii::$app->request->post())&&$model->save()){

            foreach ($model as $key => $item){
                $model[$key] = htmlspecialchars($item);
            }

            $inn = UploadedFile::getInstance($model, 'inn');
            $doc = UploadedFile::getInstance($model, 'student_doc');

            if($inn)
            {
                $model->inn = StaticFunctions::saveFile($inn, $model->id, 'dormitory');
            }
            if($doc)
            {
                $model->student_doc = StaticFunctions::saveImage($doc, $model->id, 'dormitory');
            }

            $model->country_id = 0;
            $model->status = 0;
            $model->unique_id = date('Ymd') . md5(date('ymd-hh:mm:ss'));
            if($model->save()){
                return $this->render('success',[
                    'unique' => $model->unique_id
                ]);
            }
            else
                return print_r($model->errors);
        }

        return $this->render('dormitory',[
            'model' => $model
        ]);
    }

    public function actionSuccess(){

        return $this->render('success');
    }

    public function actionSubcat(){
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
//                $out = self::getSubCatList($cat_id);
                $out = District::find()->where(['parent'=>$cat_id])->asArray()->all();
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return Json::encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionDormitoryCheck(){
        $unique_id = Yii::$app->request->get()['unique'];
        $model = Dormitory::find()->where(['unique_id'=>$unique_id])->one();
        if(!empty($model)){
            return $model->status;
        }else{
            return 'error';
        }
    }
}