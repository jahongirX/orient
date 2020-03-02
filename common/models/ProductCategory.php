<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    public function getProductCategoryLang(){
        return $this->hasMany(ProductCategoryLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'description'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['description','image'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main','ID'),
            'parent_id' => Yii::t('main','Parent ID'),
            'name' => Yii::t('main','Name'),
            'description' => Yii::t('main','Description'),
            'image' => Yii::t('main','Image')
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(),['category_id'=>'id']);
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


    public static function getModels($where = '1')
    {
        $models = [];
        foreach(ProductCategory::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
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
        foreach(ProductCategory::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {

            $name = $model->getLang('name');
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->getLang('name')];
        }

        return $models;

    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {

        foreach ($this->productCategoryLang as $item)
            $item->delete();

        return parent::beforeDelete();
    }
}
