<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'action' => $action,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'lang',['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'parent',['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['id' => 'albumlang-description-'.$model->lang])  ?>

        </div>
    </div>
</div>


<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'albumlang-description-<?=$model->lang?>', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>
