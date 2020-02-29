<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategoryLang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?php $form = ActiveForm::begin([
                'id' => 'create-form' . $id,
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'errorCssClass' => '',
                'options' => ['enctype' => 'multipart/form-data'],
                'action' => $action

            ]); ?>

                <?= $form->field($model, 'lang')->textInput(['class'=>'hidden'])->label(false) ?>

                <?= $form->field($model, 'parent')->textInput(['class'=>'hidden'])->label(false) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <div class="col-md-12">

                <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
