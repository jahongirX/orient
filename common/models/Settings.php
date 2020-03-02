<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $id
 * @property string $val
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'val'], 'required'],
            [['id'], 'string', 'max' => 100],
            [['val', 'url'], 'string', 'max' => 1000],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'val' => Yii::t('main', 'Val'),
        ];
    }

    public function getLang()
    {

        $lang =  Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id="' . $this->id.'"')->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent="'. $this->id.'" and lang='.$id)->queryOne();
        }
        return $model['val'];
    }

}
