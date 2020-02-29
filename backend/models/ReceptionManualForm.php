<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 13.12.2016
 * Time: 18:40
 */

namespace backend\models;

use common\models\Reception;
use common\models\Settings;
use yii\base\Model;

/**
 * ReceptionForm is the model behind the Reception form.
 */
class ReceptionManualForm extends Model
{
    public $startDate;
    public $endDate;
    public $updateDate;
    public $physic;
    public $legal;
    public $received;
    public $inProgress;
    public $done;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startDate','endDate','physic', 'legal', 'received','inProgress','done'], 'required'],
            [['startDate','endDate'], 'date', 'format' => 'php:Y.m.d'],
            [['physic', 'legal', 'received','inProgress','done'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'physic' => 'Jismoniy',
            'legal' => 'Yuridik',
            'received' => 'Received',
            'inProgress' => 'In Progress',
            'done' => 'Done'
        ];
    }

    public function loadDefaults(){
        $model = Settings::findOne(Reception::MANUAL_RECEPTION);
        if ($model) {
            $val = json_decode($model->val);
            $this->physic = $val->physc;
            $this->legal = $val->legal;
            $this->received = $val->rcved;
            $this->inProgress = $val->inprg;
            $this->done = $val->done;
            $this->startDate = $val->start_date;
            $this->endDate = $val->end_date;
            $this->updateDate = $val->updated_date;
        }
    }

    public function save(){
        $model = Settings::findOne(Reception::MANUAL_RECEPTION);
        if (!$model) {
            $model = new Settings();
            $model->id = Reception::MANUAL_RECEPTION;
        }
        $model->val = json_encode([
            'physc' => $this->physic,
            'legal' => $this->legal,
            'rcved' => $this->received,
            'inprg' => $this->inProgress,
            'done' => $this->done,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'updated_date' => date('Y.m.d'),
        ]);
        if($model->save()){
            return true;
        } else {
            return false;
        }
    }
}
