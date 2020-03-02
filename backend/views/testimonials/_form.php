<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--            --><?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
<!---->
<!--            --><?//= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="panel panel-default">

        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Image') ?></div>
        </div>

        <div class="panel-body">
            <?php
            if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->image )) {
                ?>

                <img class="image_preview postImage" data-title="<?=$model->name ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->image ?>"/>

                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
            
        </div>

    </div>
    <div class="panel panel-default">

        <div class="panel-body">

<!--            --><?//= $form->field($model, 'date', [
//                'options' => [
//                    'class' => 'date'
//                ]
//            ])->textInput() ?>

            <?php

            if($model->isNewRecord)
            {

                $model->status = true;

            }

            ?>

            <?= $form->field($model, 'status',
                ['options' =>
                    ['class' => 'form-group form-group-default input-group'],
                    'template' => '<label class="inline" for="testimonials-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
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
        
    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
<script type="text/javascript">
    var editor = CKEDITOR.replace( 'testimonials-message', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>