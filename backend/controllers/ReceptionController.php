<?php

namespace backend\controllers;

use backend\models\ReceptionDoneForm;
use backend\models\ReceptionManualForm;
use common\models\ReceptionSearch;
use Yii;
use common\models\Reception;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;

/**
 * ReceptionController implements the CRUD actions for Reception model.
 */
class ReceptionController extends Controller
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
     * Lists all Reception models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['rm-input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                    Reception::findOne($items[$i])->delete();
            }
        }

        $searchModel = new ReceptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        $manualmodel = new ReceptionManualForm();
        $manualmodel->loadDefaults();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'manualmodel' => $manualmodel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reception model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProgress($id)
    {
        $query = Reception::findOne($id);
        if($query && $query->status == Reception::STATUS_RECEIVED){
            $query->status = Reception::STATUS_WORKING;
            if($query->save(false)){
                Yii::$app->session->setFlash('success', 'Ushbu murojaat ko`rib chiqish uchun qo`shildi',true);
            } else {
                Yii::$app->session->setFlash('warning', 'Noaniq xatolik',true);
            }
            return $this->redirect(['reception/view','id'=>$id]);
        } else {
            Yii::$app->session->setFlash('success', 'Bunday murojaat mavjud emas',true);
            return $this->redirect(['reception/index']);
        }
    }

    public function actionDone($id)
    {
        $rec = Reception::findOne($id);
        $model = new ReceptionDoneForm();
        if($rec){
            $model->id = $id;
            if ($model->load(Yii::$app->request->post())) {


                if ($model->validate() && $model->save()) {

                    Yii::$app->session->setFlash('success', 'Javobingiz muvafaqqiyatli yuborildi.', true);
                    $model->email = $rec->email;
                    $model->subject = "Saytdagi murojaatingizga javob xati";

                    $model->message = 'Assalomu alaykum, hurmatli ' . $rec->name . '.' . '<br>'
                        . 'Sizni (' . date('Y.m.d, H:i', $rec->time) . ') dagi ushbu:' . '<br>' . '<br>'
                        . $rec->text . '<br>' . '<br>' . '<h1>Javob</h1>:' . '<br>' . '<br>' . $model->text;

                    $mail = Yii::$app->mail->compose()
                        ->setFrom(['forestry.uz@yandex.com' => \common\models\Settings::findOne('title')->val])
                        ->setTo($rec['email'])
                        ->setSubject($model->subject)
                        ->setHtmlBody('
                        <div id=":13b" class="ii gt">
    <div id=":12x" class="a3s aXjCH undefined" dir="ltr">
        <u></u>
        <div style="margin:0;min-width:100%;padding:0;width:100%!important" bgcolor="#F0F5F7">
            <p class="m_8134000323148477236reply_details" style="background:white;color:white;display:none!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:2px;line-height:2px!important;margin:0;word-break:break-word" align="center"> ➟ </p>
            <table bgcolor="#F0F5F7" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                <tbody>
                     
                    <tr style="padding:0;vertical-align:top" align="left" bgcolor="#068b69">
                        <td valign="top" style="border-collapse:collapse!important;padding:0;word-break:normal" align="left">
                            <table class="m_8134000323148477236content" width="600" cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;border-spacing:0;margin:0 auto;max-width:600px;padding:0;text-align:left;vertical-align:top;width:100%!important">
                                <tbody>
                                    <tr style="padding:0;vertical-align:top" align="left">
                                        <td class="m_8134000323148477236inside_row" valign="top" height="40" style="border-collapse:collapse!important;padding:0px 15px;word-break:normal" align="left">
                                            <p style="color:white!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:20px!important;line-height:40px!important;margin:0;word-break:break-word">O\'rmon xo\'jaligi bosh boshqarmasi - forestry.uz </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr bgcolor="#F0F5F7" style="padding:0;vertical-align:top" align="left">
                        <td valign="top" style="border-collapse:collapse!important;padding:0;word-break:normal" align="left">
                            <table class="m_8134000323148477236content" width="600" cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;border-spacing:0;margin:0 auto;max-width:600px;padding:0;text-align:left;vertical-align:top;width:100%!important">
                                <tbody>
                                    <tr style="padding:0;vertical-align:top" align="left">
                                        <td class="m_8134000323148477236inside_row" valign="top" style="border-collapse:collapse!important;padding:30px 15px;word-break:normal" align="left">
                                            <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                        
                                                        <td style="border-collapse:collapse!important;padding:0;word-break:normal" align="left" valign="top">
                                                            <h2 style="color:#3d474d;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:20px;font-weight:400;line-height:1.4;margin:0"> Salom '. $rec->name.', </h2>
                                                            <p style="color:#3d474d;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:14px;line-height:1.4;margin:0;word-break:break-word"> Sizga o\'rmon xojaligi veb-saytidan ma\'lumot yuborilmoqda </p>
                                                            <br><br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                        <td style="border-collapse:collapse!important;padding:0;word-break:normal" align="left" valign="top">
                                                            <table class="m_8134000323148477236notifications_digest" style="border-collapse:separate!important;border-radius:5px;border-spacing:0;padding:15px 20px;text-align:left;vertical-align:top;width:100%" bgcolor="white">
                                                                <tbody>
                                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                                        <td style="border-collapse:collapse!important;padding:0 0 5px;word-break:normal" align="left" valign="top">' . $model->subject. '</a> <br><br></td>
                                                                    </tr>
                                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                                        <th width="100%" style="font-weight:400;padding:0" align="left" valign="top">
                                                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                                <tbody>
                                                                                    <tr class="m_8134000323148477236notification_item" style="padding:0;vertical-align:top" align="left">
                                                                                        <th style="font-weight:400;padding:0 0 5px" align="left" valign="top">
                                                                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                                                <tbody>
                                                                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                                                                        
                                                                                                        <th style="font-weight:400;padding:0 0 5px" align="left" valign="top"> <span style="color:#3d474d;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:14px;line-height:100%!important">
                                                                                                        ' .$model->text . '</span> </th>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </th>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;border-spacing:0;border-top-color:#ced5d9;border-top-style:solid;border-top-width:1px;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                        <td valign="top" style="border-collapse:collapse!important;padding:20px 0;word-break:normal" align="left">
                                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                <tbody>
                                                                    <tr style="padding:0;vertical-align:top" align="left">
                                                                        <td width="40%" style="border-collapse:collapse!important;padding:0;word-break:normal" align="left" valign="top">
                                                                            <a href="http://forestry.uz" style="color:#8a9499!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:12px!important;line-height:1.4;text-decoration:none;word-break:break-all" target="_blank">© 2017 O\'rmon xo\'jaligi</a> 
                                                                            <p style="color:#8a9499!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:12px!important;line-height:1.4;margin:0;text-decoration:none;word-break:break-word"> bosh boshqarmasi - forestry.uz</p>
                                                                        </td>
                                                                        <td width="60%" style="border-collapse:collapse!important;padding:0;word-break:normal" align="right" valign="top">
                                                                            <p style="color:#8a9499!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:12px!important;line-height:1.4;margin:0;text-decoration:none;word-break:break-word"> <a href="http://oks.uz" style="color:#8a9499!important;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:12px!important;line-height:1.4;text-decoration:none;word-break:break-all" target="_blank">Sayt yaratish OKS TECHNOLOGY </a> </p>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
                        ');

                    if (!$mail->send()) {
                        Yii::$app->session->setFlash('warning', 'Noaniq xatolik.', true);
                    }

                    return $this->redirect(['reception/view', 'id' => $id]);

                } else {
                    Yii::$app->session->setFlash('warning', 'Noaniq xatolik.', true);
                }

            }
            return $this->render('done', [
                    'rec' => $rec,
                    'model' => $model,
                ]);
            }else {
                Yii::$app->session->setFlash('danger', 'Bunday murojaat mavjud emas.');
                return $this->redirect(['reception/index', 'id' => $id]);
            }


    }

    public function actionManual()
    {
        $model = new ReceptionManualForm();
        $model->loadDefaults();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Settings saved',true);
            } else {
                Yii::$app->session->setFlash('error', 'An error occured.',true);
            }
            return $this->redirect('index');
        } else {
            return $this->render('manual', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Reception model.
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
     * Finds the Reception model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reception the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reception::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
