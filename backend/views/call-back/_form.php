<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CallBack */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'phone')->textInput() ?>

            <?= $form->field($model, 'date')->textInput() ?>

        </div>

    </div>

</div>

<div class="col-md-12">
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
