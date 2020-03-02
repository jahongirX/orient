<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $question
 * @property string $anons
 * @property string $answer
 * @property integer $creator
 * @property string $created_date
 * @property integer $order_by
 * @property integer $status
 */
class Faq extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date'],
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
            [['name', 'email', 'phone', 'question'], 'required'],
            [['name', 'phone', 'email', 'answer', 'question', 'anons'], 'string'],
            [['email'], 'email'],
            [['creator', 'order_by', 'category', 'status'], 'integer'],
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
            'phone' => Yii::t('main', 'Phone'),
            'category' => Yii::t('main', 'Category'),
            'question' => Yii::t('main', 'Question'),
            'answer' => Yii::t('main', 'Answer'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'order_by' => Yii::t('main', 'Order By'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['backend'] = ['question'];
        $scenarios['frontend'] = ['name', 'email', 'phone', 'question'];
        return $scenarios;
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model[$column];
    }

    public static function getWhere($status = 1) {
        $langid =  StaticFunctions::getLangId();
        $where = '   faq.status='.$status;
        $where .= $langid > 0 ? ' AND faq_lang.question is not null AND faq_lang.answer is not null AND faq_lang.lang='.
            $langid : '';
        return $where;
    }
}
