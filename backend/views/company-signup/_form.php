<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
//use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\CompanySignup */
/* @var $form yii\widgets\ActiveForm */
?>

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

                <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'region')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Region::find()->asArray()->all(),'id','name'),
                    'options' => ['placeholder' => Yii::t('main', 'Выберите')],
                ]); ?>

                <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                    'type'=>DepDrop::TYPE_SELECT2,
                    'pluginOptions' => [
                        'depends' => ['companysignup-region'],
                        'placeholder' => Yii::t('main', 'Выберите'),
                        'url' => Url::to(['/company-signup/getcity']),
                        'initialize' => true,
                    ]
                ]) ?>

                <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-heading separator">
                <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
            </div>

            <div class="panel-body w-pad">

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'index')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'mfo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'okonx')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'opf')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fs')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'soato')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'okpo')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
    </div>

    <div class="col-md-12">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>