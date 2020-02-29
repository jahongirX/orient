<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['updated_date'],
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
            [['region', 'name', 'body', 'creator', 'anons'], 'required'],
            [['region', 'creator', 'status'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['name', 'leader', 'email', 'fax'], 'string', 'max' => 100],
            [['body'], 'string'],
            [['address', 'phone'], 'string', 'max' => 200],
            [['icon'], 'string', 'max' => 255],
            [['anons'], 'string', 'max' => 300],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'region' => Yii::t('main', 'Region'),
            'name' => Yii::t('main', 'Name'),
            'body' => Yii::t('main', 'Body'),
            'leader' => Yii::t('main', 'Leader'),
            'address' => Yii::t('main', 'Address'),
            'email' => Yii::t('main', 'Email'),
            'phone' => Yii::t('main', 'Phone'),
            'fax' => Yii::t('main', 'Fax'),
            'icon' => Yii::t('main', 'Icon'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'updated_date' => Yii::t('main', 'Updated Date'),
            'status' => Yii::t('main', 'Status'),
            'anons' => Yii::t('main', 'Anons'),
        ];
    }

    public function getRegionName()
    {
        return $this->hasOne(Region::className(), ['id' => 'region']);
    }

    public function beforeDelete()
    {
        $models = CompanyLang::find()->filterWhere(['parent' => $this->id])->all();

        foreach($models as $model) {

            StaticFunctions::deleteImage($model->icon, $model->id, 'company');

            $model->delete();
        }

        StaticFunctions::deleteImage($this->icon, $this->id, 'company');

        return parent::beforeDelete();
    }

    public static function getModels($region = false, $limit = false, $groupby = false) {
        $groupby = $groupby === false ? '' : ' GROUP BY pid';
        $langid =  StaticFunctions::getLangId();
        $limit = $limit !== false ? $limit = ' LIMIT '.$limit : '';
        $where = ' c.status>-1 ';
        $where .= $region !== false ? ' AND c.region='.$region : '';
        $where .= $langid > 0 ? ' AND cl.name is not null AND cl.anons is not null AND cl.lang='.
            $langid : '';
        $main = 'SELECT c.id cid, c.*, cl.*  FROM company c LEFT JOIN company_lang cl ON c.id=cl.parent WHERE ';
        $order = ' ORDER BY c.id DESC ';
//        print_r($main.$where.$order.$limit);
//        exit;
        $results = Yii::$app->db->createCommand($main.$where.$groupby.$order.$limit)->queryAll();
        $models = [];
        foreach($results as $result) {
            $model = Company::findOne($result['cid']);
            $models []= $model;
        }
        return $models;
    }

    public static function getWhere($region = false, $groupby = false) {
        $langid =  StaticFunctions::getLangId();
        $groupby = $groupby === false ? '' : ' GROUP BY company.id';
        $where = '   company.status>-1 ';
        $where .= $region !== false ? ' AND company.region='.$region : '';
        $where .= $langid > 0 ? ' AND company_lang.name is not null AND company_lang.anons is not null AND company_lang.lang='.
            $langid : '';
        $where.=$groupby;
        return $where;
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
