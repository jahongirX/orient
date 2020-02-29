<?php

namespace common\models;

use common\components\StaticFunctions;
use common\components\Model;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category
 * @property string $image
 */
class Services extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    public function getServiceCategory(){
        return $this->hasOne(ServiceCategory::className(),['id'=>'category']);
    }

    public function getServicesLang(){
        return $this->hasMany(ServicesLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category', 'description'], 'required'],
            [['category', 'status'], 'integer'],
            [['title', 'image', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('main','Title'),
            'description' => Yii::t('main','Description'),
            'category' => Yii::t('main','Category'),
            'image' => Yii::t('main','Image'),
        ];
    }

    public function beforeDelete(){

        foreach($this->servicesLang as $c)
            $c->delete();

        StaticFunctions::deleteImage($this->image, $this->id,'services');

        return parent::beforeDelete();
    }
}
