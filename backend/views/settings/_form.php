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
            <?= $model->id == 'mini_rectangle_banner' || $model->id == 'mini_square_banner' ? $form->field($model, 'url')->textInput() : '' ?>
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            <?=
            $model->id == 'logo' || $model->id == 'mini_rectangle_banner' || $model->id == 'mobile_logo' || $model->id == 'mini_square_banner' ?
                $form->field($model,'val')->fileInput()
                : $form->field($model, 'val')->textarea(['maxlength' => true, 'rows' => '4']) ?>

        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
