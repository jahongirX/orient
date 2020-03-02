<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $parent
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property integer $order_by
 * @property integer $status
 * @property string $icon2
 */
class Menu extends \yii\db\ActiveRecord
{
    const HEADER = 0;
    const LEFT_SIDE = 1;
    const FOOTER = 2;
    const FOOTER2 = 3;
    const SERVICES = 4;
    const GOVERMENT = 5;
    const OPEN_DATA = 6;
    const USEFUL = 7;
    const MID = 8;
    const FOOTER3=9;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'parent', 'order_by', 'status'], 'integer'],
            [['name', 'url'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['url', 'icon', 'icon2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'type' => Yii::t('main', 'Type'),
            'parent' => Yii::t('main', 'Parent'),
            'name' => Yii::t('main', 'Name'),
            'url' => Yii::t('main', 'Url'),
            'icon' => Yii::t('main', 'Icon'),
            'icon2' => Yii::t('main', 'Icon2'),
            'order_by' => Yii::t('main', 'Order By'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function getTitle()
    {
        $lang =  Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model['name'];
    }

    public static function getLangModels($where = '1')
    {
        $models = [];
        foreach(Menu::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            if(!empty($model->title))
                $models[]=['id' => $model->id, 'name' => $model->title];
        }

        return $models;
    }

    public static function getModels($type = false, $groupby = false) {
        $groupby = $groupby === false ? '' : ' GROUP BY mid';
        $langid =  StaticFunctions::getLangId();
        $where = ' m.status>-1 ';
        $where .= $type !== false ? ' AND m.type='.$type : '';
        $where .= $langid > 0 ? ' AND ml.name is not null AND ml.lang='.
            $langid : ' ';
        $main = 'SELECT m.id mid, m.*, ml.*  FROM menu m LEFT JOIN menu_lang ml ON m.id=ml.parent WHERE ';
        $order = ' ORDER BY m.order_by ASC ';
        $results = Yii::$app->db->createCommand($main.$where.$groupby.$order)->queryAll();
        $models = [];
        foreach($results as $result) {
            $model = Menu::findOne($result['mid']);
            $models []= $model;
        }
        return $models;
    }

    public function beforeDelete(){
        if(is_file(realpath(dirname(__FILE__)).'/../..'.Yii::$app->params['images_dir'].'menu/'.$this->icon2)){
            @unlink(realpath(dirname(__FILE__)).'/../..'.Yii::$app->params['images_dir'].'menu/'.$this->icon2);
        }
        return parent::beforeDelete();
    }
}
