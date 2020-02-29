<?php

namespace common\models;

use common\components\StaticFunctions;
use common\components\Model;
use Yii;

class Advertise extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['name', 'url', 'image'], 'string', 'max' => 255],
            [['status', 'category'], 'integer']
        ];
    }

    public function getAdvertiseLang(){
        return $this->hasMany(AdvertiseLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('main','Name'),
            'url' => Yii::t('main','Url'),
            'image' => Yii::t('main','Image'),
        ];
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

    public static function getModels($category = false, $visible = 1, $limit = false, $groupby = false) {
        $groupby = $groupby === false ? '' : ' GROUP BY pid';
        $langid =  StaticFunctions::getLangId();
        $limit = $limit !== false ? $limit = ' LIMIT '.$limit : '';
        $where = ' p.status>-1 ';
        $where .= $category !== false ? ' AND p.category='.$category : '';
        $where .= $langid > 0 ? ' AND pl.title is not null AND pl.anons is not null AND pl.lang='.
            $langid : ' AND p.visible='.$visible;
        $main = 'SELECT p.id pid, p.*, pl.*  FROM post p LEFT JOIN post_lang pl ON p.id=pl.parent WHERE ';
        $order = ' ORDER BY p.id DESC ';
//        print_r($main.$where.$order.$limit);
//        exit;
        $results = Yii::$app->db->createCommand($main.$where.$groupby.$order.$limit)->queryAll();
        $models = [];
        foreach($results as $result) {
            $model = Post::findOne($result['pid']);
            $models []= $model;
        }
        return $models;
    }

    public function beforeDelete(){

        foreach($this->advertiseLang as $c)
            $c->delete();

        StaticFunctions::deleteImage($this->image, $this->id,'advertise');

        return parent::beforeDelete();
    }

}
