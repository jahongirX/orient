<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 13.12.2016
 * Time: 18:40
 */

namespace backend\models;

use common\models\AdmissionLang;
use common\models\Languages;
use Yii;
use yii\base\Model;
use common\models\Admission;

/**
 * This is the model class for tables "admission" and "admission_lang".
 *
 * @property integer $language_id
 * @property string $name
 * @property string $level_name
 * @property string $reception_days
 * @property integer $order_by
 * @property integer $status
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $site
 * @property string $image
 * @property string $blog
 * @property string $biography
 */

/**
 * AdmissionForm is the model behind the Admission form.
 */
class AdmissionForm extends Model
{

    public $id;
    public $name;
    public $level_name;
    public $language_id;
    public $reception_days;
    public $order_by;
    public $status;
    public $phone;
    public $fax;
    public $email;
    public $site;
    public $image;
    public $blog;
    public $biography;
    public $isNewRecord = true;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'name', 'level_name'], 'required'],
            [['name', 'level_name'], 'string', 'max' => 256],
            [['language_id','order_by', 'status'], 'integer'],
            [['phone', 'fax'], 'string', 'max' => 20],
            [['email', 'image'], 'string', 'max' => 100],
            [['site', 'blog', 'biography'], 'string', 'max' => 200],
            [['reception_days'], 'string', 'max' => 500],
            [['site'],'url', 'defaultScheme' => ''],
            ['email','email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('main', 'Name'),
            'level_name' => Yii::t('main', 'Level Name'),
            'language_id' => Yii::t('main', 'Language ID'),
            'reception_days' => Yii::t('main', 'Reception Days'),
            'order_by' => Yii::t('main', 'Order By'),
            'status' => Yii::t('main', 'Status'),
            'phone' => Yii::t('main', 'Phone'),
            'fax' => Yii::t('main', 'Fax'),
            'email' => Yii::t('main', 'Email'),
            'site' => Yii::t('main', 'Site'),
            'image' => Yii::t('main', 'Image'),
            'blog' => Yii::t('main', 'Blog'),
            'biography' => Yii::t('main', 'Biography'),
        ];
    }

    public function save(){
        if(!$this->validate()){
            return false;
        }
        $adm = new Admission();
        $lq = Languages::findOne($this->language_id);
        if($lq){
            $adm->status = $this->status ? $this->status : '';
            $adm->order_by = $this->order_by ? $this->order_by : '';
            $adm->phone = $this->phone ? $this->phone : '';
            $adm->fax = $this->fax ? $this->fax : '';
            $adm->email = $this->email ? $this->email : '';
            $adm->site = $this->site ? $this->site : '';
            $adm->image = $this->image ? $this->image : '';
            $adm->blog = $this->blog ? $this->blog : '';
            $adm->biography = $this->biography ? $this->biography : '';
            if($adm->save()){
                $this->id = $adm->id;
                $lng = new AdmissionLang();
                $lng->admission_id = $this->id;
                $lng->language_id = $this->language_id;
                $lng->name = $this->name;
                $lng->level_name = $this->level_name;
                $lng->reception_days = $this->reception_days;
                if($lng->save()){
                    return true;
                }
            }
        }
        return false;
    }

    public function update()
    {
        if(!$this->validate()){
            return false;
        }
        $adm = Admission::findOne($this->id);
        $adm->status = $this->status;
        $adm->order_by = $this->order_by;
        $adm->phone = $this->phone;
        $adm->fax = $this->fax;
        $adm->email = $this->email;
        $adm->site = $this->site;
        $adm->image = $this->image;
        $adm->blog = $this->blog;
        $adm->biography = $this->biography;
        if($adm->save()){
            $lng = AdmissionLang::find()->where(['admission_id'=>$this->id, 'language_id' => $this->language_id])->one();
            if(!$lng) {
                $lng = new AdmissionLang();
                $lng->admission_id = $this->id;
                $lng->language_id = $this->language_id;
            }
            $lng->name = $this->name;
            $lng->level_name = $this->level_name;
            $lng->reception_days = $this->reception_days;
            if($lng->save()){
                return true;
            }
        }
        return false;
    }
}
