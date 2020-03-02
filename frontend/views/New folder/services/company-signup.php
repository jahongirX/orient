<?php

use common\models\Region;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kato\DropZone;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReceptionForm */
/* @var $form ActiveForm */
/* @var $admission  \common\models\Admission[] */
/** @var \common\models\Admission $manager */

$this->title = Yii::t('main','Kompaniyani ro`yhatdan o`tkazish');
$this->params['breadcrumbs'][] = $this->title;

$regions = ArrayHelper::map(Region::getLangModels(),'id', 'name');

$uploadtext = Yii::t('main','Загрузить файл');
$this->registerJs("Dropzone.prototype.defaultOptions.dictDefaultMessage = '$uploadtext';");

?>

<section class="mt-10 mb-20">

    <div class="container">
        <?=
        \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumb hidden-xs']
        ]) ?>

        <?php
        if($formSubmitted){
            ?>
            <div class="services-reception  col-md-9">
                <h1 class="allheadone332"><?= Yii::t('main','Спасибо, ваша заявка принята.') ?></h1>
                <div class="mb-2 pl-2 res-bg resi">
                    <i class="fa fa-check-circle"></i>
                    <div class="clear mt-2"></div>
                    <?= Yii::t('main','Ответ будет отправлен на вашу указанную почту.') ?>
                </div>
            </div>
            <?php
        } else {
            ?>

            <div class="services-reception  col-md-9">
                <h1 class="allheadone332"><?= Yii::t('main','aobuliush') ?></h1>
                <div class="res-bg">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="col-md-12">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'region')->widget(Select2::classname(), [
                            'data' => $regions,
                            'options' => ['placeholder' => 'Select type ...'],
                        ]);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                            'type'=>DepDrop::TYPE_SELECT2,
                            'class' => 'btn-danger',
                            'options'=>['id' => 'receptionform-district'],
                            'select2Options' => ['pluginOptions'=>['allowClear'=>false]],
                            'pluginOptions' => [
                                'depends' => ['companysignupform-region'],
                                'placeholder' => 'Select...',
                                'url' => Url::to(['/site/getcity'])
                            ]
                        ]) ?>
                    </div>
                    <div class="col-md-9">
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'index')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-10">
                        <?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="clear clearfix"></div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'mfo')->textInput(['maxlength' => true])->label(Yii::t('main', 'Mfo')) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'okonx')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="clear clearfix"></div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'rs')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'opf')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'fs')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'soato')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'okpo')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form->field($model, 'file')->hiddenInput(['id' => 'company-signup-image-input']) ?>
                        <?= DropZone::widget([
                            'uploadUrl' => '/services/upload-file-reception',
                            'options' => ['maxFilesize' => '4', 'maxFiles' => '1',],
                            'clientEvents' => [
                                'success' => "function(file,r){console.log(r.name);document.getElementById('company-signup-image-input').value=r.name;}",
                                'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
                                'removedfile' => "function(file){console.log(file.name + ' is removed')}"
                            ],
                        ]) ?>
                    </div>
                    <div class="col-md-4 capt">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>
                    </div>
                    <div class="clear clearfix"></div>
                    <div class="col-md-4">
                        <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary']) ?>
                    </div>






                    <div class="clear clearfix"></div>



                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="col-md-3">
            <?= \frontend\widgets\Sidebar::widget([
                'Banner' => true,
                'Banner2' => true,
                'Weather' => true,
                'Poll' => true,
            ])?>

        </div>
        </div>


</section>



