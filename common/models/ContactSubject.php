<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_subject".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class ContactSubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getContactSubjectLang(){
        return $this->hasMany(ContactSubjectLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    public static function getLangModels($where = '1')
    {
        $models = [];
        foreach(ContactSubject::find()->where('status>0 AND '.$where)->orderBy(['id' => SORT_ASC])->all() as $model)
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

        foreach($this->contactSubjectLang as $c)
            $c->delete();

        return parent::beforeDelete();
    }
}
