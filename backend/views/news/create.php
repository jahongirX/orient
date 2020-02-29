<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = Yii::t('main', 'Add News');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Newses'), 'url' => ['index']];
$this->params['breadcrumbs']['title'] = $this->title;
$js = <<<'JS'
    countInput = 0;
    var idInput = 1;
    $('#add-file').on('click', function(){
        if(countInput<30) {
        var obj = $('#files');
        var html = '<div class="col-md-12">\
            <div class="input-group">\
                <label class="input-group-btn">\
                <span class="btn btn-primary">\
                Browse&hellip; <input type="file" style="display: none;" name="file[]" id="file-' + idInput +'">\
                </span>\
                </label>\
                <input type="text" class="form-control" readonly>\
            </div>\
        </div>';
        obj.append(html);
        countInput ++;
        idInput ++;
        }
    });

    function removeClick(obj) {
        countInput--;
        var parent = obj.parent();
        parent.remove();
    }

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

<style>
    .remove-btn {
        float: left;
        cursor: pointer;
        margin: 3px 10px;
    }
</style>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<div class="container-fluid container-fixed-lg m-t-20">

	<div class="panel panel-transparent">

        <div class="panel-body no-padding">
			<div class="panel panel-default">
				<div class="panel-body page-header-block">
					<h2><?= Html::encode($this->title) ?></h2>
            	</div>
			</div>
		</div>

        <div class="panel-body no-padding row-default">

            <div class="row">

                <?php $form = ActiveForm::begin([
                    'id' => 'create-form1',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'errorCssClass' => '',
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>

                <div class="col-md-8">

                    <div class="panel panel-default">


                        <div class="panel-body">

                            <?= $form->field($model, 'title')->label('Заголовок') ?>

                            <?= $form->field($model, 'second_title')->label('Подзаголовок') ?>

                            <?= $form->field($model, 'body')->label('Контент')->textarea(); ?>

                            <?= $form->field($model, 'event_date')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Выберите дату публикации ...'],
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                ]
                            ]);

                            ?>

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
                            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image )) {
                                ?>

                                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image ?>"/>

                                <?php
                            } else {
                                ?>

                                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                                <?php
                            }
                            ?>
                            <?= $form->field($model, 'main_image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
                        </div>
                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading separator">
                            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
                        </div>

                        <div class="panel-body w-pad">

                            <?= $form->field($model, 'category[]')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\NewsCategory::getLangModels(),'id','name'),['class'=>'full-width multi']) ?>

                            <?php

                                $model->status = true;

                            ?>

                            <?= $form->field($model, 'status',
                                ['options' =>
                                    ['class' => 'form-group form-group-default input-group'],
                                    'template' => '<label class="inline" for="news-status">' . Yii::t('main', 'Status') . ' </label><span class="input-group-addon bg-transparent">{input}</span>',
                                    'labelOptions' => ['class' => 'inline']
                                ])->checkbox([
                                'data-init-plugin' => 'switchery',
                                'data-color' => 'primary',
                                'checked' => 'checked',
                            ], false);
                            ?>

                            <?= $form->field($model, 'slider',
                                ['options' =>
                                    ['class' => 'form-group form-group-default input-group'],
                                    'template' => '<label class="inline" for="news-slider">' . Yii::t("main", "Slider") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
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
                    <?= Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'news-body', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>