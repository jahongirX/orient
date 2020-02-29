<?php

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Guests;


class GuestIdentity extends Component
{
    public $id;
    public function init() {
        $cookies = Yii::$app->request->cookies;
        $ck = $cookies->getValue('_pIdC', false);
        if($ck && $us = Guests::findOne(['identity' => $ck])){
            $this->id = $us->id;
        } else {
            $ck = md5(time()).'.'.uniqid().'.'.sha1(Yii::$app->request->userIP);
            $us = new Guests();
            $us->identity = $ck;
            $us->lastdate = time();
            $us->save();
            $this->id = $us->id;
        }
        $rescookies = \Yii::$app->response->cookies;
        $rescookies->add(new \yii\web\Cookie(['name' => '_pIdC', 'value' => $ck, 'expire' => (time() + 3600*24*365)]));

    }
}

