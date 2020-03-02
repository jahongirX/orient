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

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'lang', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'parent', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'title')->label( Yii::t('main', 'Title') ) ?>

            <?= $form->field($model, 'second_title')->label( Yii::t('main', 'Subtitle') ) ?>

            <?= $form->field($model, 'body')->label( Yii::t('main', 'Content') )->textarea(['id' => 'pagelang-body-'.$model->lang]); ?>

        </div>

    </div>

</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Image');?></div>
        </div>
        <div class="panel-body">
            <?php
            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->main_image )) {
                ?>

                <img class="image_preview postImage" data-title="<?=$model->title ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/l_' . $model->main_image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->main_image ?>"/>

                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'main_image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['id' => 'pagelang-image' . $id, 'class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
        </div>
    </div>
</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'pagelang-body-<?=$model->lang?>', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>