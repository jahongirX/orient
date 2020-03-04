<?php

namespace common\models;

use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

class Product extends ActiveRecord
{
    public $category;

    public static function tableName()
    {
        return 'product';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','category_id'], 'integer'],
            [['name'], 'required'],
            [['name','price'], 'string', 'max' => 100],
            [['text','articul','model','depth','butt','color'], 'string'],
            [['description'], 'string', 'max' => 300],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category_id' => Yii::t('main','Category'),
            'name' => Yii::t('main', 'Name'),
            'description' => Yii::t('main', 'Description'),
            'text' => Yii::t('main','Text'),
            'image' => Yii::t('main', 'Image'),
            'price' => Yii::t('main', 'Price'),
            'status' => Yii::t('main', 'Status'),
            'articul' => Yii::t('main', 'Articul'),
            'model' => Yii::t('main', 'Model'),
            'depth' => Yii::t('main', 'Depth'),
            'butt' => Yii::t('main', 'Butt'),
            'color' => Yii::t('main', 'Color'),
            
        ];
    }

    public function getProductCategory(){
        return $this->hasOne(ProductCategory::className(),['id'=>'category_id']);
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

    public function beforeDelete()
    {
        $models = ProductLang::find()->filterWhere(['parent' => $this->id])->all();

        foreach($models as $model) {

            StaticFunctions::deleteImage($model->image, $model->parent);

            $model->delete();
        }

        StaticFunctions::deleteImage($this->image, $this->id);

        return parent::beforeDelete();
    }
}
