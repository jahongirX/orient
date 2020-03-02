<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'f_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'birth_date')->textInput() ?>

                  <?= $form->field($model, 'country_id')->textInput() ?>

                  <?= $form->field($model, 'region_id')->textInput() ?>

                  <?= $form->field($model, 'district_id')->textInput() ?>

                  <?= $form->field($model, 'male')->textInput() ?>

                  <?= $form->field($model, 'passport_serial')->textInput() ?>

                  <?= $form->field($model, 'passport_number')->textInput() ?>

                  <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                  <?= $form->field($model, 'student_doc')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>


            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
