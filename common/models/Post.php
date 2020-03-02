<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $category
 * @property integer $type
 * @property integer $visible
 * @property integer $creator
 * @property string $created_date
 * @property string $event_date
 * @property integer $status
 * @property string $title
 * @property string $second_title
 * @property string $anons
 * @property string $body
 * @property string $main_image
 * @property string $secondary_image
 * @property string $icon
 * @property integer $seen_count
 */
class Post extends ActiveRecord
{
    const HOLDING_NEWS =1;
    const AD = 2;
    const SLIDER = 3;
    const EVENT_SLIDER = 4;
    const MINI_BANNER = 5;
    const STATIC_PAGE = 6;
    const VIDEO = 7;
    const USEFUL = 9;
    const UZB_NEWS = 10;
    const TENDERS_KONKURS = 12;
    const MINI_BANNER_KVADRAT = 20;
    public static function tableName()
    {
        return 'post';
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
        return $this->hasOne(PostCategory::className(), ['id' => 'category']);
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

    public static function getWhere($category = false, $visible = 1) {
        $langid =  StaticFunctions::getLangId();
        $where = '   post.status>-1 ';
        $where .= $category !== false ? ' AND post.category='.$category : '';
        $where .= $langid > 0 ? ' AND post_lang.title is not null AND post_lang.anons is not null AND post_lang.lang='.
            $langid : ' AND post.visible='.$visible;
        return $where;
    }

    public function beforeDelete()
    {
        $models = PostLang::find()->filterWhere(['parent' => $this->id])->all();

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
