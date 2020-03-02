<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
$this->title = Yii::t('main', 'Upload Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
        </div>

        <div class="panel-body no-padding row-default">

            <div class="row">

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

                            <?php

                            echo '<label class="control-label"><?=Yii::t?></label>';
                            echo FileInput::widget([
                                'model' => $model,
                                'attribute' => 'upload_images[]',
                                'options' => ['multiple' => true , 'class' => 'class'],
                                'pluginOptions' => [
                                    'allowedFileExtensions'=>['jpg','jpeg','png','bmp'],
                                    'showPreview' => true,
                                    'showCaption' => true,
                                    'showRemove' => true,
                                    'showUpload' => false,
                                    'showCancel' => false
                                ]
                            ]);

                            ?>


                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <div class="form-group field-menu-name required">
                                 <?= $form->field($model, 'album')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Album::find()->all(),'id','name'),['class'=>'full-width multi'])?>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>