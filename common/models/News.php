<?php

namespace common\models;

use common\components\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

class News extends Model
{
    public static function tableName()
    {
        return 'news';
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
            [['creator', 'status', 'slider'], 'integer'],
            [['creator', 'title','category'], 'required'],
            [['created_date', 'event_date'], 'safe'],
            [['title', 'second_title'], 'string', 'max' => 150],
            [['anons'], 'string', 'max' => 300],
            [['body'], 'string'],
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
            'type' => Yii::t('main', 'Type'),
            'visible' => Yii::t('main', 'Visible'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
            'title' => Yii::t('main', 'Title'),
            'second_title' => Yii::t('main', 'Second Title'),
            'anons' => Yii::t('main', 'Anons'),
            'body' => Yii::t('main', 'Body'),
            'main_image' => Yii::t('main', 'Main Image'),
            'secondary_image' => Yii::t('main', 'Secondary Image'),
            'icon' => Yii::t('main', 'Icon'),
        ];
    }

    public function getCategoryName()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category']);
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id . ' AND status=1')->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang=' . $id . ' AND status=1')->queryOne();
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
        $main = 'SELECT p.id pid, p.*, pl.*  FROM news p LEFT JOIN news_lang pl ON p.id=pl.parent WHERE ';
        $order = ' ORDER BY p.id DESC ';
//        print_r($main.$where.$order.$limit);
//        exit;
        $results = Yii::$app->db->createCommand($main.$where.$groupby.$order.$limit)->queryAll();
        $models = [];
        foreach($results as $result) {
            $model = News::findOne($result['pid']);
            $models []= $model;
        }
        return $models;
    }

    public static function getWhere($category = false, $visible = 1) {
        $langid =  StaticFunctions::getLangId();
        $where = '   news.status>-1 ';
        $where .= $category !== false ? ' AND news.category='.$category : '';
        $where .= $langid > 0 ? ' AND news_lang.title is not null AND news_lang.anons is not null AND news_lang.lang='.
            $langid : ' AND news.visible='.$visible;
        return $where;
    }

    public function beforeDelete()
    {
        $models = NewsLang::find()->filterWhere(['parent' => $this->id])->all();

        foreach($models as $model) {

            StaticFunctions::deleteImage($model->main_image, $model->parent);

            $model->delete();
        }

        StaticFunctions::deleteImage($this->main_image, $this->id);
        StaticFunctions::deleteImage($this->secondary_image, $this->id);
        StaticFunctions::deleteImage($this->icon, $this->id);

        return parent::beforeDelete();
    }
}
