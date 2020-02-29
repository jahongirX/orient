<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$js = <<<'JS'
    $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        // label = input.val();
        label = input.val().replace('/\\/g', '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  $('body').on('fileselect', ':file', function(event, numFiles, label) {
      var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
JS;

$this->registerJs($js,\yii\web\View::POS_END);

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                <div class="row" id="files">

                    <div class="col-md-12">

                        <h4><?=Yii::t('main','add-file')?></h4>

                        <div class="input-group">

                            <label class="input-group-btn">

                                <span class="btn btn-primary">

                                    Browse&hellip; <input type="file" style="display: none;" name="Books[file]" id="books-file" >

                                </span>

                            </label>

                            <input type="text" class="form-control" readonly>

                        </div>

                    </div>

                    <div class="col-md-12" style="margin-top:25px">
                        <?php
                        if($model->file && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/' . $model->file )) {
                            ?>

                            <h5><?=Yii::t('main','current-file')?> : </h5> <a class="btn btn-success" href="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/' . $model->file ?>" ><?=$model->file?> </a>

                            <?php
                        } else {
                            ?>
                            <h5><?= Yii::t('main','File not uploaded yet!')?></h5>

                            <?php
                        }
                        ?>

                    </div>

                </div>

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

                    <img class="image_preview postImage" data-title="<?=$model->title ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->image ?>"/>

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

            <div class="panel-body w-pad">

                <?php

                if($model->isNewRecord){

                    $model->status = true;

                }

                ?>

                <?= $form->field($model, 'status',
                    ['options' =>
                        ['class' => 'form-group form-group-default input-group'],
                        'template' => '<label class="inline" for="books-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
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
