<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-body">

            <?php $form = ActiveForm::begin([
                'id' => 'create-form' . $id,
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'errorCssClass' => '',
                'action' => $action,
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'lang',['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'parent',['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'name')->label( Yii::t('main', 'Title') ) ?>

        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
