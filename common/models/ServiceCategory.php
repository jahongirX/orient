<?php

namespace common\models;

use common\components\StaticFunctions;
use common\components\Model;
use Yii;

/**
 * This is the model class for table "service_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class ServiceCategory extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_category';
    }

    /**
     * @inheritdoc
     */

    public function getServiceCategoryLang(){
        return $this->hasMany(ServiceCategoryLang::className(),['parent'=>'id']);
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['status'], 'integer'],
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
            'description' => Yii::t('main','Description'),
        ];
    }

    public function beforeDelete(){

        foreach($this->serviceCategoryLang as $c)
            $c->delete();

        return parent::beforeDelete();
    }
}
