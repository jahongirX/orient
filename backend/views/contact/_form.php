<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subject')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ContactSubject::getLangModels(),'id','name'),[
                'class'=>'full-width', 'data-init-plugin' => 'select2'
            ]) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'created_date')->textInput() ?>

        </div>

    </div>

</div>
<div class="col-md-12">

    <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

    <?php ActiveForm::end(); ?>

