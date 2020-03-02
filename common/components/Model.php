<?php

namespace common\components;

use Yii;
use common\models\Languages;

class Model extends \yii\db\ActiveRecord
{
 
    public function getLang($column, $lang = null)
    {
        $lang = $lang ? $lang : Yii::$app->language;

        if($lang == Yii::$app->params['main_language']) {

            $model = Yii::$app->db->createCommand('SELECT ' . $column . ' FROM ' . $this->tableName() . ' WHERE id=' . $this->id )->queryOne();

        } else {

            $lang_id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('SELECT ' . $column . ' FROM ' . $this->tableName() . '_lang WHERE parent="' . $this->id . '" AND lang=' . $lang_id )->queryOne();

        }

        return $model[$column];
    }
}
