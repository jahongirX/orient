<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'create-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'value')->textarea(['maxlength' => true, 'rows' => '6']) ?>

        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
