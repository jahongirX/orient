<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceptionDoneForm */
/* @var $form ActiveForm */
/* @var $rec common\models\Reception */

$this->title = 'Murojaatga javob yozish.';
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Murojaatlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Murojaat id: {uniqid}',['uniqid'=>$rec->uniqid]) , 'url' => ['view', 'id' => $rec->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="panel panel-default">
        <div class="panel-body">
<div class="reception-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>
<!-- reception-form -->