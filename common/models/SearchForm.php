<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 15.12.2016
 * Time: 15:11
 */

namespace common\models;

use Yii;
use yii\base\Model;

class SearchForm extends Model
{

    public $text;

    public function rules()
    {
        return [
            ['text', 'string', 'min' => 3],
            ['text', 'required'],
        ];
    }

    public function attributeLabels()
    {
        /*return [
            'text' => 'Qidiruv matni',
        ];*/
    }

    public function search()
    {
        $lang =  Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $result = News::find()->filterWhere(['like', 'body', '%'.$this->text.'%', false])->andFilterWhere(['like', 'title', '%'.$this->text.'%', false])->all();
        } else {
            $result = News::find()->where(['lang' => $lang])->andFilterWhere(['like', 'body', '%'.$this->text.'%', false])->all();
        }
        return $result;
    }
}