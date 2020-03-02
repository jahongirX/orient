<?php

namespace common\components;

use common\models\Languages;
use Yii;

class Controller extends \yii\web\Controller
{

    public function actionLang($lang) {

        $query = Languages::find()->where('abb= "' . $lang . '" AND status>-1')->one();

        if($query || $lang == Yii::$app->params['main_language']) {

            $lang_id = $lang == Yii::$app->params['main_language'] ? 3 : $query->id;

            Yii::$app->language = $lang;
            Yii::$app->session->set('lang', $lang);
            Yii::$app->session->set('lang_id', $lang_id);

            $rescookies = \Yii::$app->response->cookies;
            
            $rescookies->add(new \yii\web\Cookie([
                'name' => '_language', 
                'value' => $lang, 
                'expire' => (time() + 3600 * 24 * 365)
            ]));

            $rescookies->add(new \yii\web\Cookie([
                'name' => '_lid', 
                'value' => $lang_id, 
                'expire' => (time() + 3600 * 24 * 365)
            ]));

        }

        return $this->referrer();
    }

    public function referrer()
    {

        if(isset(Yii::$app->request->referrer) && !empty(Yii::$app->request->referrer)){

            return $this->redirect(Yii::$app->request->referrer);

        } else {

            return $this->goHome();

        }
    }
}