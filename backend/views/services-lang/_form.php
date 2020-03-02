<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

            <?= $form->field($model, 'lang', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'parent', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'description')->textarea(['id' => 'serviceslang-description-' . $model->lang]) ?>

        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="panel panel-default">

        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
        </div>

        <div class="panel-body w-pad">

            <?php

            if($model->isNewRecord){

                $model->status = true;

            }

            ?>

            <?= $form->field($model, 'status',
                ['options' =>
                    ['class' => 'form-group form-group-default input-group'],
                    'template' => '<label class="inline" for="serviceslang-status-' . $model->lang . '">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
                    'labelOptions' => ['class' => 'inline']
                ])->checkbox([
                'data-init-plugin' => 'switchery',
                'data-color' => 'primary',
                'id' => 'serviceslang-status-' . $model->lang
            ], false);
            ?>

        </div>
    </div>
</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'serviceslang-description-<?= $model->lang ?>', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>