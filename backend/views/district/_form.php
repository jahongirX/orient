<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

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

                <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Region::getModels(), 'id','name' ),['class'=>'full-width', 'data-init-plugin' => 'select2']) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-heading separator">
                <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
            </div>

            <div class="panel-body w-pad">

                <?= $form->field($model, 'order_by')->textInput() ?>

                <?php

                if($model->isNewRecord){

                    $model->status = true;

                }

                ?>

                <?= $form->field($model, 'status',
                    ['options' =>
                        ['class' => 'form-group form-group-default input-group'],
                        'template' => '<label class="inline" for="region-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
                        'labelOptions' => ['class' => 'inline']
                    ])->checkbox([
                    'data-init-plugin' => 'switchery',
                    'data-color' => 'primary'
                ], false);
                ?>

            </div>
        </div>
    </div>

    <div class="col-md-12">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>