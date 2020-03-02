<?php
namespace frontend\controllers;

use Codeception\Lib\Connector\Guzzle;
use Guzzle\Http\Url;
use common\models\Menu;
use common\models\Partner;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\httpclient\Client;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Cookie;
use yii\web\Response;
use common\models\Contact;
use common\models\Languages;
use common\models\ServiceRequest;
use common\models\TelegramSettings;
use common\models\TelegramUser;
use common\models\Admission;
use common\models\Advertise;
use common\models\Callback;
use common\models\Company;
use common\models\District;
use common\models\Email;
use common\models\Polls;
use common\models\Reception;
use common\models\SearchForm;
use common\models\Faq;
use common\models\Testimonials;
use common\components\Controller;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
             'captcha' => [
//                 'class' => 'yii\captcha\CaptchaAction',
                 'class' => 'common\components\MyCaptchaAction',
                 'fixedVerifyCode' => YII_ENV_TEST ? 'test' : null,
//                 'TestLimit'=>99,
             ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionHeadquarters()
    {
        $models = Admission::find(['status' => 1])->orderBy(['order_by' => SORT_ASC])->all();

        return $this->render('headquarters',[
            'models' => $models
        ]);
    }

    public function actionSitemap()
    {
        $models = $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::HEADER])->orderBy(['order_by' => SORT_ASC])->all();
        return $this->render('sitemap',[
            'models' => $models
        ]);
    }

    public function actionServices()
    {
        return $this->render('services');
    }

    public function actionDocuments()
    {
        return $this->render('documents');
    }

    public function actionA()
    {
//        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->render('test');
    }

    public function actionVote($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->isAjax){
            $option = PollOptions::findOne($id);

            if($option){
                $poll = Polls::findOne($option->poll);
                if($poll){
                    $uservote = PollData::findOne(['poll' => $poll->id, 'user' => Yii::$app->guest->id]);
                    if($uservote){
                        $uservote->option = $id;
                        if($uservote->save()){
                            $data = PollOptions::find()->where(['poll' => $poll->id])->all();
                            $out = [];
                            foreach ($data as $item) {
                                $out[] = [
                                    'id' => $item->id,
                                    'count' => $item->count
                                ];
                            }
                            return ['success' => true, 'data' => $out, 'selected' => $id, 'total' => $poll->voteCount];
                        }
                    } else {
                        $vote = new PollData();
                        $vote->poll = $poll->id;
                        $vote->user = Yii::$app->guest->id;
                        $vote->option = $id;
                        $vote->time = time();
                        if($vote->save()){
                            $data = PollOptions::find()->where(['poll' => $poll->id])->all();
                            $out = [];
                            foreach ($data as $item) {
                                $out[] = [
                                    'id' => $item->id,
                                    'count' => $item->count
                                ];
                            }
                            return ['success' => true, 'selected' => $id, 'data' => $out, 'total' => $poll->voteCount];
                        }
                    }
                }
            }
        }
        return ['success' => false];
    }

    public function actionGetcity()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (isset($_POST['depdrop_parents'])) {
            $pid = (int)$_POST['depdrop_parents'][0];
            $out = District::find()->where('parent LIKE '.$pid)->all();
        } else {
            $out = [];
        }
        return ['output'=>$out, 'selected'=>''];
    }

    public function actionReceptionStatus()
    {
        sleep(2);

        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = Yii::$app->request->post( 'reception-status-id' );

        $reception = Reception::findOne([
            'uniqid' => $id
        ]);

        if( $reception )
        {
            $status     = '';
            $reply_text = '';
            $reply_date = '';
            $send_date  = '';
            $done       = false;

            switch ($reception->status)
            {
                case Reception::STATUS_RECEIVED:

                    $status = 0;

                    //$status    = Yii::t('main', 'Sizning murojaatingiz qabul qilingan, tez orada ko`rib chiqiladi.');
                    $send_date = date( 'Y.m.d', $reception->time );

                    break;

                case Reception::STATUS_WORKING:

                    $status = 1;

                    //$status    = Yii::t('main', 'Sizning murojaatingiz ko`rib chiqilmoqda.');
                    $send_date = date( 'Y.m.d', $reception->time );

                    break;

                case Reception::STATUS_DONE:

                    $status = 2;

                    //$status = Yii::t('main', 'Sizning murojaatingiz ko`rib chiqildi. Javob ko`rsatilgan elektron pochtaga yuborildi.');

                    $send_date  = date( 'Y.m.d', $reception->time );
                    $reply_date = date( 'Y.m.d', $reception->reply_time );
                    $reply_text = $reception->reply_text;
                    $done       = true;

                    break;
            }

            return [
                'success'    => true,
                'status'     => $status,
                'done'       => $done,
                'send_date'  => $send_date,
                'reply_text' => $reply_text,
                'reply_date' => $reply_date
            ];

        } else {

            return [
                'success' => true,
                //'status' => Yii::t('main', 'Ushbu ID bo`yicha murojaat topilmadi.'),
                'status'  => 3,
                'done'    => false
            ];

        }
    }

    public function actionSearch()
    {
        $model = new SearchForm();
        $results = null;
        $formSubmitted = false;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $results = $model->search();
            $formSubmitted = true;
        }
        return $this->render('search', [
            'model' => $model,
            'formSubmitted' => $formSubmitted,
            'results' => $results,
        ]);
    }

    public function actionAbout()
    {
        $adverts = Advertise::find()->limit(4)->all();
        return $this->render('about',['adverts' => $adverts]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionFaq()
    {
        $model = new Faq();

        if(Yii::$app->language == Yii::$app->params['main_language'])
        {
            $models = Faq::find()->where('status=1 AND answer IS NOT NULL')->orderBy(['id' => SORT_DESC])->all();

        } else {

            $lang = Yii::$app->language;
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $models = Faq::find()->leftJoin('faq_lang', 'faq.id=faq_lang.parent')->where('faq_lang.status=1 AND faq_lang.answer IS NOT NULL AND faq_lang.lang=' . $id)->orderBy(['faq.id' => SORT_DESC])->all();

        }

        return $this->render('faq', [
            'model' => $model,
            'models' => $models
        ]);
    }

    public function actionFaqForm()
    {
        $model = new Faq();
        $model->scenario = 'frontend';

        if ( $model->load(Yii::$app->request->post()) )
        {
            if ( $model->save() )
            {
                $template = TelegramSettings::findOne(['id' => 'FaqTemplate']);
                $users = TelegramUser::find()->all();

                $name = $model->name;
                $phone = $model->phone;
                $email = $model->email;
                $question = $model->question;

                $rplc_name = '/{\$name}/';
                $rplc_phone = '/{\$phone}/';
                $rplc_email = '/{\$email}/';
                $rplc_question = '/{\$question}/';

                $tpl = $template->value;

                $tpl = preg_replace($rplc_name, $name, $tpl);
                $tpl = preg_replace($rplc_phone, $phone, $tpl);
                $tpl = preg_replace($rplc_email, $email, $tpl);
                $tpl = preg_replace($rplc_question, $question, $tpl);

                foreach ($users as $user) {
                    $query = [
                        'chat_id' => $user->user_id,
                        'text' => $tpl,
                        'parse_mode' => 'HTML'
                    ];

                    $text = Yii::$app->httpclient->get('https://api.telegram.org/bot484198503:AAHL8gGK6NKPPIVwliyvbE88GOKv3Ka9tLw/sendMessage?' . http_build_query($query));
                }

                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true];
            }
        }

        return false;
    }

    public function actionAppView() {
        $where = \common\models\Faq::getWhere($status = 2);
        $query = \common\models\Faq::find()->leftJoin('faq_lang', 'faq.id=faq_lang.parent')->where($where)->asArray();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);
        return $this->render('appView',['provider' => $provider]);
    }

    public function actionMistake($id = '') {
        $this->layout = 'mistake';
        if($post = Yii::$app->request->post()) {
            $link = $post['url'];
            $comment = $post['comment'];
            $mistake = $post['mistake'];
            $subject = Yii::t('main','Сообщения про ошибки');
            $body = Yii::t('main','Сайт: ').$link.'. Ошибка: '.$mistake.'. Комментария: '.$comment;
//            $to = Settings::findOne('email')->val;

            $mail = Yii::$app->mail->compose()
                ->setFrom(['forestry.uz@yandex.com' => \common\models\Settings::findOne('title')->val])
                ->setTo(['forestry.uz@yandex.com' => 'forestry.uz@yandex.com'])
                ->setSubject($subject)
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
                                                                        <td style="border-collapse:collapse!important;padding:0 0 5px;word-break:normal" align="left" valign="top"> <a style="color:#3d474d;font-family:Avenir,\'Segoe UI\',Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.4;padding-left:10px;text-decoration:none;vertical-align:middle;word-break:break-all" >' . $body. '</a> <br><br></td>
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
                                                                                                        </span> </th>
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

            //            MailSender::send($to,$subject,$body,null);
            return $this->render('success');
        }
        return $this->render('mistake', ['id' => $id]);
    }

    public function actionCompanies($id = 0) {
        $region = 0;
        if($id != 0) {
            $where = Company::getWhere($id,1);
            $region = $id;
        } else {
            $where = Company::getWhere();
        }
        $models = Company::find()->leftJoin('company_lang', 'company.id=company_lang.parent')->where($where)->asArray()->all();

        return $this->render('companies',['models' => $models, 'region' => $region]);
    }

    public function actionCompany($id) {
        $model = Company::findOne($id);
        if($model)
            return $this->render('company',['model' => $model]);

        return $this->referrer();
    }

    public function actionPrintCompany($id) {
        if($model = Company::findOne($id)) {
            $this->layout = 'print';
            return $this->render('printCompany',['model' => $model]);
        }
        return $this->referrer();
    }

    public function actionVoice() {
        $speech = Yii::$app->request->cookies->getValue('speech', 0);
        $speech = $speech == 0 ? 1 : 0;
        if($speech == 1) {
            Yii::$app->session->set('modal',1);
        }
        $val = new Cookie(['name' => 'speech', 'value' => $speech, 'expire' => (time() + 3600 * 24 * 365)]);
        Yii::$app->response->cookies->add($val);
        return $this->referrer();
    }

    public function actionAddEmail() {

        $request = Yii::$app->request;

        $email = $request->post('email');

        Yii::$app->response->format = Response::FORMAT_JSON;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return 0;

        $model = Email::find()->filterWhere(['email' => $email]);

        if($model->exists())
            return 2;

        $model = new Email();
        $model->email = $email;
        $model->created_date = date('Y-m-d H:i:s');
        $model->status = 1;
        $model->save();

        return 1;
    }

    public function actionStatistics(){
        return $this->render('statistics');
    }

    public function actionMarketing(){
        $adverts = Advertise::find()->limit(4)->all();
        return $this->render('marketing',['adverts' => $adverts]);
    }

    public function actionContacts()
    {
        $model = new \common\models\Contact();
        
        $request = Yii::$app->request->post();
        
        if ($model->load(Yii::$app->request->post()))
        {
            
            $model->created_date = date('U');

            $Template = TelegramSettings::findOne(['id' => 'contactstemplate']);
            $Users = TelegramUser::find()->all();


            if($model->save()){
                Yii::$app->session->setFlash('success', 'Murojaatingiz qabul qilindi!');
                $name = $model->name;
                $email = $model->email;
                $body = $model->body;
                $phone = $model->phone;
            
                $rplc_name = '/{\$name}/';
                $rplc_email = '/{\$email}/';
                $rplc_phone = '/{\$phone}/';
                $rplc_body = '/{\$body}/';
                
                $tpl = $Template->value;
                
                $tpl = preg_replace($rplc_name, $name, $tpl);
                $tpl = preg_replace($rplc_email, $email, $tpl);
                $tpl = preg_replace($rplc_body, $body, $tpl);
                $tpl = preg_replace($rplc_phone, $phone, $tpl);
                
                 foreach ($Users as $user) 
                 {
                    $query = [
                        'chat_id' => $user->user_id,
                        'text' => $tpl,
                        'parse_mode' => 'HTML'
                    ];
                    $client = new Client();
                    $client->get('http://pinnacle.uz/site/yuridik-bot?chat_id=276046538&text=dddddd')->send();

                 }


                $model = new \common\models\Contact();
                return $this->render('contacts', [
                    'model' => $model
                ]);
            }
            
        } else {
            $session = Yii::$app->session;
            $session->remove('success');
            return $this->render('contacts', [
                'model' => $model
            ]);

        }
    }

    public function actionContactForm()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->save())
            {
                // $template = TelegramSettings::findOne(['id' => 'contactstemplate']);
                // $users = TelegramUser::find()->all();

                // $name = $model->name;
                // $email = $model->email;
                // $phone = $model->phone;
                // $body = $model->body;

                // $rplc_name = '/{\$name}/';
                // $rplc_email = '/{\$email}/';
                // $rplc_phone = '/{\$phone}/';
                // $rplc_body = '/{\$body}/';

                // $tpl = $template->value;

                // $tpl = preg_replace($rplc_name, $name, $tpl);
                // $tpl = preg_replace($rplc_email, $email, $tpl);
                // $tpl = preg_replace($rplc_phone, $phone, $tpl);
                // $tpl = preg_replace($rplc_body, $body, $tpl);

                // foreach ($users as $user)
                // {
                //     $query = [
                //         'chat_id' => $user->user_id,
                //         'text' => $tpl,
                //         'parse_mode' => 'HTML'
                //     ];

                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'success' => true,
                        // 'link' => Yii::$app->httpclient->get('https://api.telegram.org/bot484198503:AAHL8gGK6NKPPIVwliyvbE88GOKv3Ka9tLw/sendMessage?' . http_build_query($query) )
                    ];

                // }


            }
        }

        return false;
    }

    public function actionCallback()
    { 
        
       $model = new Callback();

        $request = Yii::$app->request->post();

        $model->phone = $request['phone'];
        $model->status = 1;

        if($model->save())
        {
            $Template = TelegramSettings::findOne(['id' => 'callbackTemplate']);
            $Users = TelegramUser::find()->all();

            $number = $model->phone;

            $rplc_number = '/{\$number}/';

            $tpl = $Template->value;

            $tpl = preg_replace($rplc_number, $number, $tpl);

            foreach ($Users as $user) 
            {
                $query = [
                    'chat_id' => $user->user_id,
                    'text' => $tpl
                ];

                $text = Yii::$app->httpclient->get('https://api.telegram.org/bot449415262:AAGBKavsedIhPpLo12vMd4XnXkaVBsSVI-Q/sendMessage?' . http_build_query($query) );
            }

            return 'success';
        }
            
    }

    public function actionTestimonialForm()
    {
        $model = new Testimonials();

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->save())
            {
                $template = TelegramSettings::findOne(['id' => 'TestimonialsTemplate']);
                $users = TelegramUser::find()->all();

                $name = $model->name;
                $phone = $model->phone;
                $text = $model->message;

                $rplc_name = '/{\$name}/';
                $rplc_phone = '/{\$phone}/';
                $rplc_text = '/{\$text}/';

                $tpl = $template->value;

                $tpl = preg_replace($rplc_name, $name, $tpl);
                $tpl = preg_replace($rplc_phone, $phone, $tpl);
                $tpl = preg_replace($rplc_text, $text, $tpl);

                foreach ($users as $user) {
                    $query = [
                        'chat_id' => $user->user_id,
                        'text' => $tpl,
                        'parse_mode' => 'HTML'
                    ];

                    $text = Yii::$app->httpclient->get('https://api.telegram.org/bot484198503:AAHL8gGK6NKPPIVwliyvbE88GOKv3Ka9tLw/sendMessage?' . http_build_query($query));
                }

                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true];
            }
        }
    }

    public function actionTestimonials()
    {
        $models = Testimonials::find()->where('status=1');

        $pagination = new Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 3,
        ]);

        $models = $models->offset($pagination->offset)->limit(3)->all();

        return $this->render('testimonials',[
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function actionPartners()
    {
        $models = Partner::find()->where('status=1');

        $pagination = new Pagination([
            'totalCount' => $models->count(),
            'pageSize' => 4,
        ]);

        $models = $models->offset($pagination->offset)->limit(4)->all();

        return $this->render('partners',[
            'models' => $models,
            'pagination' => $pagination
        ]);
    }

    public function  actionServiceRequestForm()
    {
        $model = new ServiceRequest();

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->save())
            {
                $template = TelegramSettings::findOne(['id' => 'ServiceRequestTemplate']);
                $users = TelegramUser::find()->all();

                $name = $model->name;
                $phone = $model->phone;
                $email = $model->email;
                $company = $model->company;
                $text = $model->message;

                $rplc_name = '/{\$name}/';
                $rplc_phone = '/{\$phone}/';
                $rplc_email = '/{\$email}/';
                $rplc_company = '/{\$company}/';
                $rplc_text = '/{\$text}/';

                $tpl = $template->value;

                $tpl = preg_replace($rplc_name, $name, $tpl);
                $tpl = preg_replace($rplc_phone, $phone, $tpl);
                $tpl = preg_replace($rplc_email, $email, $tpl);
                $tpl = preg_replace($rplc_company, $company, $tpl);
                $tpl = preg_replace($rplc_text, $text, $tpl);

                foreach ($users as $user) {
                    $query = [
                        'chat_id' => $user->user_id,
                        'text' => $tpl,
                        'parse_mode' => 'HTML'
                    ];

                    $text = Yii::$app->httpclient->get('https://api.telegram.org/bot484198503:AAHL8gGK6NKPPIVwliyvbE88GOKv3Ka9tLw/sendMessage?' . http_build_query($query));
                }

                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['success' => true];
            }
        }
    }

}

