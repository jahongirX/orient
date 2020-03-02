<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BooksLang */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'action' => $action,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">


            <?= $form->field($model, 'parent')->textInput(['class'=>'hidden'])->label(false) ?>

            <?= $form->field($model, 'lang')->textInput(['class'=>'hidden'])->label(false) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

        <?php ActiveForm::end(); ?>
