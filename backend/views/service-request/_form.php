<?php

use common\components\StaticFunctions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'phone') ?>

                <?= $form->field($model, 'subject')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ServiceRequestSubject::getLangModels(),'id','name')) ?>

                <?= $form->field($model, 'company') ?>

                <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

            </div>

        </div>

        </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-body">

                <div class="form-group">

                    <label class="inline" for="service-id"><?=Yii::t('main', 'Service')?></label>

                    <a href="/services/view/<?= $model->service->id ?>" class="form-group form-group-default input-group clipboard">
                        <label class="inline" for="service-id"><?=Yii::t('main', 'Link')?></label>
                        <span class="input-group-addon" style="min-width: 300px;">
                            <input type="text" id="service-id" class="form-control" value="<?= StaticFunctions::getPartOfText( $model->service->title, 50 ) ?>">
                        </span>
                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?=  Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>
