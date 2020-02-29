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

$this->title = Yii::t('main','Virtual qabulxona');
$this->params['breadcrumbs'][] = $this->title;

$regions = ArrayHelper::map(Region::getLangModels(),'id', 'name');

$uploadtext = Yii::t('main','Загрузить файл');
$this->registerJs("Dropzone.prototype.defaultOptions.dictDefaultMessage = '$uploadtext';");

?>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="section-breadcrumb">
                    <?=
                    \yii\widgets\Breadcrumbs::widget([
                        'itemTemplate' => "<a>{link}</a> - ",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        //'options' => ['class' => 'breadcrumb hidden-xs']
                    ]) ?>
                </div>
                <div class="contact-page">
                    <?php
                    if($formSubmitted){
                        ?>
                        <div class="services-reception  col-md-9">
                            <h2><?= Yii::t('main','Спасибо, ваша заявка принята.') ?></h2>
                            <div class="mb-2 pl-2 res-bg resi">
                                <i class="fa fa-check-circle"></i>
                                <div class="clear mt-2"></div>
                                <?= Yii::t('main','Ваш ID:') ?> <?= $model->uniqid ?>.<br/>
                                <?= Yii::t('main','Ответ будет отправлен на вашу указанную почту.') ?>
                            </div>
                        </div>
                        <?php
                    } else {
                    ?>
                    <div class="section-single-title"><?= Yii::t('main','Подписатся на прием') ?></div>
                    <div class="contact-info">
                        <div class="res-bg">
                            <?php $form = ActiveForm::begin(['options'=>['class'=>'form']]); ?>
                            <div class="col-md-10">
                                <div class=""><?= $form->field($model, 'name') ?></div>
                            </div>
                            <?php
                            if($select < 1){
                                ?>
                                <div class="col-md-10">
                                    <div class=""><?= $form->field($model, 'admissionId')->dropDownList($admission,['options' => [$select => ['selected'=>'selected']]]) ?></div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="col-md-5"><?= $form->field($model, 'email') ?></div>
                            <div class="col-md-5"><?= $form->field($model, 'phone') ?></div>
                            <div class="clearfix clear"></div>

                            <div class="col-md-4"><?= $form->field($model, 'person_type')->dropDownList([0 => 'Jismoniy shaxs', 1 => 'Yuridik shaxs'], [
                                    'onChange' => '$("#receptionform-firm_name").prop("disabled", $(this).val() == 1 ? false : true);console.log($(this).val());'
                                ]) ?></div>
                            <div class="col-md-6"><?= $form->field($model, 'firm_name')->textInput(['disabled'=>true]) ?></div>
                            <div class="clearfix clear"></div>

                            <div class="col-md-4"><?= $form->field($model, 'passport') ?></div>
                            <div class="clearfix clear"></div>
                            <div class="col-md-10">
                                <?= $form->field($model, 'region')->widget(Select2::classname(), [
                                    'id' => 'receptionform-region',
                                    'data' => $regions,
                                    'options' => ['placeholder' => Yii::t('main','Select type')],
                                ]);
                                ?>
                            </div>
                            <div class="col-md-10">
                                <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                                    'type'=>DepDrop::TYPE_SELECT2,
                                    'class' => 'btn-danger',
                                    'options'=>['id'=>'receptionform-district'],
                                    'select2Options'=>['pluginOptions'=>['allowClear'=>false]],
                                    'pluginOptions'=>[
                                        'depends'=>['receptionform-region'],
                                        'placeholder'=>Yii::t('main','Select type'),
                                        'url'=>Url::to(['/site/getcity'])
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-md-8"><?= $form->field($model, 'address') ?></div>
                            <div class="col-md-2"><?= $form->field($model, 'index') ?></div>
                            <div class="col-md-10">
                                <?php
                                echo $form->field($model, 'type')->widget(Select2::classname(), [
                                    'id' => 'menu-type',
                                    'data' => [0 => 'Заявление', 1 => 'Жалоба', 2 => 'Предложение'],
                                    'options' => ['placeholder' => Yii::t('main','Select type')],
                                ])->label(Yii::t('main','Тип обращения'));
                                ?>
                            </div>

                            <div class="col-md-12"><?= $form->field($model, 'text')->textarea() ?></div>

                            <div class="clearfix clear"></div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'image')->hiddenInput(['id' => 'reception-image-input']) ?>
                                <?= DropZone::widget([
                                    'uploadUrl' => '/services/upload-file-reception',
                                    'options' => ['maxFilesize' => '4', 'maxFiles' => '1',],
                                    'clientEvents' => [
                                        'success' => "function(file,r){console.log(r.name);document.getElementById('reception-image-input').value=r.name;}",
                                        'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
                                        'removedfile' => "function(file){console.log(file.name + ' is removed')}"
                                    ],
                                ]) ?>
                            </div>
                            <div class="clearfix clear"></div>
                            <div class="col-md-6 capt"><?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?></div>

                            <div class="form-group col-md-10">
                                <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary']) ?>
                            </div>
                            <div class="clearfix clear"></div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div id="map"></div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>
