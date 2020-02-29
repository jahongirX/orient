<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 13.12.2016
 * Time: 18:40
 */

namespace backend\models;

use common\models\PollLang;
use common\models\PollOptionLang;
use common\models\PollOptions;
use Yii;
use yii\base\Model;
use common\models\Polls;
use common\models\Languages;

/**
 * This is the model class for tables "polls" and "poll_lang".
 *
 * @property integer $language_id
 * @property string $name
 * @property integer $status
 * @property integer $id
 */

/**
 * AdmissionForm is the model behind the Admission form.
 */
class PollsForm extends Model
{

    public $id;
    public $name;
    public $language_id;
    public $status;
    public $isNewRecord = true;

    private $optionsData = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'name','options'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['language_id', 'status'], 'integer'],
            [['options'], 'each', 'rule' => ['required']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('main', 'Name'),
            'language_id' => Yii::t('main', 'Language ID'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function save(){
        if(!$this->validate()){
            Yii::$app->session->setFlash('error', 'Validation Error');
            return false;
        }
        $poll = new Polls();
        $lq = Languages::findOne($this->language_id);
        if($lq){
            $poll->status = $this->status ? $this->status : 0;
            $poll->creator = Yii::$app->user->id;
            $poll->time = time();
            if(count($this->optionsData) > 1 && $poll->save()){
                $this->id = $poll->id;
                $lng = new PollLang();
                $lng->poll = $this->id;
                $lng->language = $this->language_id;
                $lng->name = $this->name;
                if($lng->save()){
                    $options = $this->optionsData;
                    foreach ($options as $option) {
                        $opt = new PollOptions();
                        $opt->poll = $this->id;
                        $opt->status = 1;
                        $opt->time = time();
                        if($opt->save()){
                            $optlang = new PollOptionLang();
                            $optlang->option = $opt->id;
                            $optlang->language = $this->language_id;
                            $optlang->name = $option;
                            $optlang->save();
                        }
                        unset($opt);
                        unset($optlang);
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public function update()
    {
        if(!$this->validate()){
            Yii::$app->session->setFlash('error', 'Validation Error');
            return false;
        }
        $poll = Polls::findOne($this->id);
        $poll->status = $this->status;
        if($poll->save()){
            $lng = PollLang::find()->where(['poll'=>$this->id, 'language' => $this->language_id])->one();
            if(!$lng) {
                $lng = new PollLang();
                $lng->poll = $this->id;
                $lng->language = $this->language_id;
            }
            foreach ($this->optionsData as $key => $option) {
                $optlang = PollOptionLang::findOne(['option' => $key, 'language' => $this->language_id]);
                if($optlang){
                    $optlang->name = $option;
                } else {
                    $optlang = new PollOptionLang();
                    $optlang->option = $key;
                    $optlang->language = $this->language_id;
                    $optlang->name = $option;
                }
                $optlang->save();
            }
            $lng->name = $this->name;
            return $lng->save();
        }
        return false;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->optionsData;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        $this->optionsData = $options;
    }
}
