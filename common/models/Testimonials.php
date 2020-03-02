<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "testimonials".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $message
 * @property integer $status
 * @property string $date
 * @property string $position
 */
class Testimonials extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonials';
    }

     public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'message'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['date'], 'safe'],
            [['name', 'position', 'image'], 'string', 'max' => 300],
            [['phone'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('main','Name'),
            'phone' => Yii::t('main','Phone'),
            'message' => Yii::t('main','Message'),
            'status' => Yii::t('main','Status'),
            'image' => Yii::t('main','Image'),
            'date' => Yii::t('main','Date'),
            'position' => Yii::t('main','Position'),
        ];
    }
    
     public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model[$column];
    }

    public static function getModels($where = '1')
    {
        $models = [];
        foreach(PostCategory::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->name;
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->name];
        }

        return $models;
    }

    public static function getLangModels($where = '1')
    {
        $models = [];
        foreach(PostCategory::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->getLang('name');
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->getLang('name')];
        }

        return $models;
    }
    
}
