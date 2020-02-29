<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "advertise_lang".
 *
 * @property integer $id
 * @property integer $lang
 * @property integer $parent
 * @property string $image
 */
class AdvertiseLang extends Advertise
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertise_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang', 'parent'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => Yii::t('main','Lang'),
            'parent' => Yii::t('main','Parent'),
            'image' => Yii::t('main','Image'),
        ];
    }

    public function beforeDelete(){

        StaticFunctions::deleteImage($this->image, $this->parent,'advertise');

        return parent::beforeDelete();
    }
}
