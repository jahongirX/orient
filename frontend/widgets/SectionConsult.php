<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:48
 */

namespace frontend\widgets;


use common\models\Callback;
use Yii;
use yii\base\Widget;

class SectionConsult extends Widget
{
    public function run()
    {
        $model = new Callback();
        $request = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post()))
        {

            $model->date = date('U');

//            $Template = TelegramSettings::findOne(['id' => 'contactstemplate']);
//            $Users = TelegramUser::find()->all();


            if($model->save()){
                Yii::$app->session->setFlash('success', 'Murojaatingiz qabul qilindi!');
                $name = $model->name;
//                $email = $model->email;
//                $body = $model->body;
                $phone = $model->phone;

//                $rplc_name = '/{\$name}/';
//                $rplc_email = '/{\$email}/';
//                $rplc_phone = '/{\$phone}/';
//                $rplc_body = '/{\$body}/';

//                $tpl = $Template->value;

//                $tpl = preg_replace($rplc_name, $name, $tpl);
//                $tpl = preg_replace($rplc_email, $email, $tpl);
//                $tpl = preg_replace($rplc_body, $body, $tpl);
//                $tpl = preg_replace($rplc_phone, $phone, $tpl);

//                foreach ($Users as $user)
//                {
//                    $query = [
//                        'chat_id' => $user->user_id,
//                        'text' => $tpl,
//                        'parse_mode' => 'HTML'
//                    ];
//                    $client = new Client();
//                    $client->get('http://pinnacle.uz/site/yuridik-bot?chat_id=276046538&text=dddddd')->send();
//
//                }


                $model = new Callback();
                return $this->render('SectionConsult', [
                    'model' => $model
                ]);
            }

        } else {
            $session = Yii::$app->session;
            $session->remove('success');
            return $this->render('SectionConsult', [
                'model' => $model
            ]);

        }

//        return $this->render('SectionConsult');
    }
}