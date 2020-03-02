<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_request_subject".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class ServiceRequestSubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_request_subject';
    }

    public function getServiceRequestSubjectLang(){
        return $this->hasMany(ServiceRequestSubjectLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('main', 'Name'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public static function getLangModels($where = '1')
    {
        $models = [];
        foreach(ServiceRequestSubject::find()->where('status>0 AND '.$where)->orderBy(['id' => SORT_ASC])->all() as $model)
        {
            $name = $model->getLang('name');
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->getLang('name')];
        }

        return $models;
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model[$column];
    }

    public function beforeDelete(){

        foreach($this->serviceRequestSubjectLang as $c)
            $c->delete();

        return parent::beforeDelete();
    }
}
