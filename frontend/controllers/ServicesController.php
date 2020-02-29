<?php
namespace frontend\controllers;

use common\components\StaticFunctions;
use common\models\Admission;
use common\models\Languages;
use common\models\ReceptionForm;
use common\models\ServiceCategory;
use common\models\ServiceRequest;
use common\models\Services;
use common\models\Settings;
use Yii;
use yii\helpers\ArrayHelper;
use common\components\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;

class ServicesController extends Controller
{

    public function actionIndex()
    {
        $request = new ServiceRequest();

        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = Services::find()->where('status=1')->orderBy(['id' => SORT_DESC])->all();
            $ServiceCategories = ServiceCategory::find()->where('status=1')->orderBy(['id' => SORT_ASC])->all();

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;

            $models = Services::find()->leftJoin('services_lang', 'services.id=services_lang.parent')->where('services_lang.status = 1 AND services_lang.lang=' . $id)->orderBy(['services.id' => SORT_DESC])->all();


            $ServiceCategories = ServiceCategory::find()->leftJoin('service_category_lang', 'service_category.id=service_category_lang.parent')->where('service_category_lang.status = 1 AND service_category_lang.lang=' . $id . ' AND service_category_lang.name IS NOT NULL')->orderBy(['service_category.id' => SORT_DESC])->all();

        }

        return $this->render('index', [
            'request' => $request,
            'models' => $models,
            'ServiceCategories' => $ServiceCategories
        ]);
    }

    public function actionView($id) {

        $model = Services::findOne($id);

        if( $model )
        {
            return $this->render('view', [
                'model' => $model
            ]);
        }

        return $this->referrer();

    }

    public function actionVirtualReception()
    {
        $model = new ReceptionForm();
        $mq = Admission::find()->where(['id' => StaticFunctions::getSettings('director-id')]);

        if($mq->exists()){
            $model->admissionId = 1;
            $manager = $mq->one();
        } else {
            $manager = false;
            Url::to(['services/virtual-reception']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->save()){

                    $file = UploadedFile::getInstance($model, 'image');
                    if($file)
                    {
                        $file->name = uniqid().'_'.rand().time().'_'.Yii::$app->guest->id.'.'.$file->extension;
                        $model->image = StaticFunctions::saveFile($file, '', 'reception');
                    }

                    $model->save();

                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'success' => true,
                        'uniqid' => $model->uniqid
                    ];
                }
            }
        }


        if (!Yii::$app->session->has('_oferta')) {
            Yii::$app->session->set('_oferta', 0);
        }
        return $this->render('virtual-reception', [
            'model' => $model,
            'manager' => $manager,
        ]);
    }

    public function actionReception( $id=0 )
    {
        $model = new ReceptionForm();
        $admission = ArrayHelper::map(Admission::find()->where('status > 0')->orderBy('order_by')->all(), 'id', 'fullname');
        $mq = Admission::find()->where(['id' => $id]);

        if($id > 0 && $mq->exists())
        {
            $model->admissionId = $id;
            $manager = $mq->one();

        } else {

            $manager = false;

        }

//        print_r(Yii::$app->request->post());die;
//        $formSubmitted = false;

        if ( $model->load(Yii::$app->request->post()) )
        {


            if ($model->save())
            {
                $file = UploadedFile::getInstance($model, 'image');
              
                if($file)
                {
                    $file->name = uniqid().'_'.rand().time().'_'.Yii::$app->guest->id.'.'.$file->extension;
                    $model->image = StaticFunctions::saveFile($file, '', 'reception');
                }
                //$formSubmitted = true;

                $model->save();

                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'success' => true,
                    'uniqid' => $model->uniqid
                ];
            }
        }

        return $this->render('reception', [
            'model' => $model,
            'select' => $id,
            'manager' => $manager,
            'admission' => $admission,
            //'formSubmitted' => $formSubmitted,
        ]);
    }

    public function actionPrint( $id ) {

        if($model = Services::findOne($id))
        {
            $this->layout = 'print';

            return $this->render('print',[
                'model' => $model
            ]);
        }

        return $this->referrer();
    }


}
