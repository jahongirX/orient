<?php

namespace common\models;

use Yii;
use common\components\StaticFunctions;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $url
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'image', 'url', 'category'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'category' => Yii::t('main', 'Category'),
            'image' => Yii::t('main', 'Image'),
            'url' => Yii::t('main', 'Url'),
        ];
    }

    public function beforeDelete()
    {
        $models = BannerLang::find()->filterWhere(['parent' => $this->id])->all();

        foreach($models as $model) {

            StaticFunctions::deleteImage($model->image, $model->parent, 'banner');

            $model->delete();
        }

        StaticFunctions::deleteImage($this->image, $this->id, 'banner');

        return parent::beforeDelete();
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
}
