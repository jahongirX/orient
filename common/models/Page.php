<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $category
 * @property integer $creator
 * @property string $created_date
 * @property string $update_date
 * @property integer $status
 * @property string $title
 * @property string $second_title
 * @property string $keywords
 * @property string $body
 * @property string $main_image
 * @property string $secondary_image
 * @property string $icon
 * @property integer $seen_count
 */
class Page extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['update_date'],
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
            [['creator', 'title'], 'required'],
            [['creator', 'status', 'seen_count'], 'integer'],
            [['created_date', 'update_date'], 'safe'],
            [['title', 'second_title', 'body'], 'string'],
            [['category'], 'string', 'max' => 50],
            [['keywords'], 'string', 'max' => 300],
            [['main_image', 'secondary_image', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category' => Yii::t('main', 'Category'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
            'title' => Yii::t('main', 'Title'),
            'second_title' => Yii::t('main', 'Second Title'),
            'body' => Yii::t('main', 'Body'),
            'main_image' => Yii::t('main', 'Main Image'),
            'seen_count' => Yii::t('main', 'Seen Count'),
            'secondary_image' => Yii::t('main', 'Secondary Image'),
            'icon' => Yii::t('main', 'Icon'),
            'keywords' => Yii::t('main', 'Keywords'),
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

    public function beforeDelete()
    {
        $models = PageLang::find()->filterWhere(['parent' => $this->id])->all();
        foreach($models as $model) {

            StaticFunctions::deleteImage($model->main_image, $model->parent, 'page');

            $model->delete();
        }

        StaticFunctions::deleteImage($this->main_image, $this->id, 'page');
        StaticFunctions::deleteImage($this->secondary_image, $this->id, 'page');
        StaticFunctions::deleteImage($this->icon, $this->id, 'page');

        return parent::beforeDelete();
    }
}
