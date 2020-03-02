<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionManualForm */
/* @var $form ActiveForm */

$this->title = Yii::t('main', 'Murojaatlarni o`zgartirish');
$this->params['breadcrumbs'][] = ['label' => 'Murojaatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h3><?=$this->title?></h3>

    <div class="panel panel-default">
        <div class="panel-body">
<div class="reception-manual">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'physic') ?>
        <?= $form->field($model, 'legal') ?>
        <?= $form->field($model, 'received') ?>
        <?= $form->field($model, 'inProgress') ?>
        <?= $form->field($model, 'done') ?>
        <?= $form->field($model, 'startDate')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter start date ...'],
            'value' => $model->startDate,
            'pluginOptions' => [
                'format' => 'yyyy.mm.dd',
                'autoclose'=>true
            ]
        ]);?>
        <?= $form->field($model, 'endDate')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter start date ...'],
            'value' => $model->endDate,
            'pluginOptions' => [
                'format' => 'yyyy.mm.dd',
                'autoclose'=>true
            ]
        ]);?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
        </div>
    </div>

<!-- reception-manual -->
