<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = Yii::t('main', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs']['title'] = $this->title;

?>

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

                            <?= $form->field($model, 'name')->label('Название') ?>

                            <?= $form->field($model, 'description')->label('Описание') ?>

                            <?= $form->field($model,'text')->textarea(['row'=>6])?>

                            <?= $form->field($model, 'articul')->label('articul') ?>

                            <?= $form->field($model, 'model')->label('model') ?>

                            <?= $form->field($model, 'depth')->label('depth') ?>

                            <?= $form->field($model, 'butt')->label('butt') ?>

                            <?= $form->field($model, 'color')->label('color') ?>

                            <?= $form->field($model, 'price')->label('price') ?>

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
                            if($model->image && file_exists(Yii::getAlias('@frontend') . '/web/uploads/product/' . $model->id . '/m_' . $model->image )) {
                                ?>

                                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . '/product/' . $model->id . '/m_' . $model->image ?>"/>

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

                        <div class="panel-heading separator">
                            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
                        </div>

                        <div class="panel-body w-pad">

                            <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\ProductCategory::find()->all(),'id','name'),['class'=>'full-width multi']) ?>

                            <?php

                                $model->status = true;

                            ?>

                            <?= $form->field($model, 'status',
                                ['options' =>
                                    ['class' => 'form-group form-group-default input-group'],
                                    'template' => '<label class="inline" for="post-status">Status</label><span class="input-group-addon bg-transparent">{input}</span>',
                                    'labelOptions' => ['class' => 'inline']
                                ])->checkbox([
                                'data-init-plugin' => 'switchery',
                                'data-color' => 'primary',
                                'checked' => 'checked',
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
    var editor = CKEDITOR.replace( 'product-text', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>