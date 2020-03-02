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

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Icon') ?></div>
        </div>
        <div class="panel-body">
            <?php
            if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->image )) {
                ?>

                <img class="image_preview postImage" data-title="<?=$model->name ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/l_' . $model->image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->image ?>"/>


                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['id' => 'bannerlang-image' . $id, 'class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
