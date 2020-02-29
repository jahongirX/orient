<?php

use common\models\Region;
use common\models\Settings;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;
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

//$uploadtext = Yii::t('main','Загрузить файл');
//$this->registerJs("Dropzone.prototype.defaultOptions.dictDefaultMessage = '$uploadtext';");
//


//if(Yii::$app->session->has('_oferta')){
//    Yii::$app->session->set('_oferta',0);
//}
//else
//    Yii::$app->session->set('_oferta',1);


$js = <<<JS
$('#offerta').modal('show');
JS;


$this->registerJs('

    $("#modal_ok").click(function() {
        
           $.ajax({
           url: "/services/turnoff-oferta",
           type: "get",
           data: {},
           success: function () {}
        });
        
        
    });
');

$this->registerJs("$('#modalClose').click(function() {
    document.location.href='/';
});");

if(Yii::$app->session->get('_oferta') == 0) {
    $this->registerJs($js,\yii\web\View::POS_READY);
}
//echo "<pre>";
//print_r($model);
?>

    <div class="modal fade" id="offerta" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"  id="modalClose" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?=Yii::t('main','oferta_title')?></h4>
                </div>
                <div class="modal-body">
                    <p><?=Yii::t('main','oferta')?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id = "modal_ok">OK</button>
                </div>
            </div>

        </div>
    </div>



    <section class="mt-10 mb-90 page-content virtual-reception">
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

                            <h2><?= Yii::t('main','Спасибо, ваша заявка принята.') ?></h2>

                            <div class="mb-2 pl-2 res-bg resi">

                                <i class="fa fa-check-circle"></i>

                                <div class="clear mt-2"></div>

                                <?= Yii::t('main','Ваш ID') ?>: <?= $model->uniqid ?>.<br/>
                                <?= Yii::t('main','Дата') ?>: <?= date('Y.m.d, H:i') ?>.<br/>
                                <?= Yii::t('main','статус обращения') ?>

                            </div>

                        </div>

                        <?php

                    } else {

            ?>

                <div class="services-reception   col-md-9">

                    <h2 ><?= Yii::t('main','Виртуальная приемная') ?></h2>

                    <div>
                        <div class="row mt-1 mb-2">

                            <div class="col-md-12 te-text">

                                <?= Yii::t('main','Если имеются заявления, жалобы или предложения в области пищевой промышленности, то у Вас есть возможность отправить их в виде обращения Руководителю Холдинга') ?>

                            </div>

                        </div>
                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="res-bggreen">

                                    <div class="res-sizes"><i class="fa fa-desktop"></i></div>

                                    <div class="te-text mb-1">
                                        <span><?= Yii::t('main','Через веб адрес') ?>: <b><?=Settings::findOne('web-site')->val?></b></span>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="res-bggreen">

                                    <div class="res-sizes"><i class="fa fa-phone"></i></div>

                                    <div class="te-text mb-1">
                                        <span><?= Yii::t('main','По телефону') ?> <b><a href="tel:+<?= str_replace(['+',' ','(',')', '-'],'',Settings::findOne('call-center-phone')->val) ?>" data-container="body" data-toggle="popover" data-placement="left" data-content="<?= Yii::t('main','Ishonch telefoni') ?>"><?=\common\models\Settings::findOne('call-center-phone')->val?></a></b></span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row" style=" display: block;">

                            <div class="col-md-12 mb-1 te-text">
                                <?php
                                    if($manager->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'admission' . '/' . $manager->id . '/s_' . $manager->image) )
                                    {
                                        echo '<img class="img-responsive postImage" src="' . Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'admission' . '/' . $manager->id . '/s_' . $manager->image . '"/>';

                                    }else {

                                        echo "No Image";

                                    }
                                ?>
                            </div>

                            <div class="col-md-12 mb-4 te-text"><?= $manager->fullName ?> <?= Yii::t('main','virtual qabulxonasi') ?></div>

                            <div class="clear clearfix"></div>

                        </div>


                    </div>

                    <div class="res-bg">

                        <?php $form = ActiveForm::begin(['options'=>[
                                'class'=>'form',
                                'enctype' => 'multipart/form-data'
                        ]]); ?>

                        <div class="col-md-12 col-lg-10">

                            <div class="">
                                <?= $form->field($model, 'name',[
                                    'template' => "{input}{label}"
                                ]) ?>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'email',[
                                'template' => "{input}{label}"
                            ]) ?>

                        </div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'phone',[
                                'template' => "{input}{label}"
                            ]) ?>

                        </div>

                        <div class="clearfix clear"></div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'person_type',[
                                'template' => "{input}",
                            ])->dropDownList([
                                0 => 'Jismoniy shaxs',
                                1 => 'Yuridik shaxs'
                            ],
                                [
                                    'onChange' => '$("#receptionform-firm_name").prop("disabled", $(this).val() == 1 ? false : true);console.log($(this).val());',
                                    'class' => 'nice-select'
                                ]) ?>

                        </div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'firm_name',[
                                'template' => "{input}{label}"
                            ])->textInput(['disabled'=>true]) ?>

                        </div>

                        <div class="clearfix clear"></div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'passport',[
                                'template' => "{input}{label}"
                            ]) ?>

                        </div>

                        <div class="clearfix clear"></div>

                        <div class="col-md-6 col-lg-5">

                            <?= $form->field($model, 'region',[
                                'template' => "{input}"
                            ])->dropDownList($regions, [
                                'class' => 'nice-select'
                            ]);
                            ?>

                        </div>

                        <div class="col-md-6 col-lg-5">


                            <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
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


                        <div class="col-md-6">

                            <?= $form->field($model, 'address',[
                                'template' => "{input}{label}"
                            ]) ?>

                        </div>

                        <div class="col-md-6 col-lg-4">

                            <?= $form->field($model, 'index',[
                                'template' => "{input}{label}"
                            ]) ?>

                        </div>

                        <div class="col-md-12 col-lg-10">

                            <?= $form->field($model, 'type',[
                                'template' => "{input}"
                            ])->dropDownList([
                                0 => 'Заявление',
                                1 => 'Жалоба',
                                2 => 'Предложение'
                            ], [
                                'class' => 'nice-select'
                            ]);
                            ?>

                        </div>

                        <div class="col-md-12 col-lg-10">

                            <?= $form->field($model, 'text', [
                                'template' => "{input}{label}"
                            ])->textarea() ?>

                        </div>

                        <div class="clearfix clear"></div>
                        <div class="col-md-12">

<!--                            --><?//= $form->field($model, 'image')->hiddenInput(['id' => 'reception-image-input']) ?>
<!--                            --><?//= DropZone::widget([
//                                'uploadUrl' => '/services/upload-file-reception',
//                                'options' => ['maxFilesize' => '4', 'maxFiles' => '1',],
//                                'clientEvents' => [
//                                    'success' => "function(file,r){console.log(r.name);document.getElementById('reception-image-input').value=r.name;}",
//                                    'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
//                                    'removedfile' => "function(file){console.log(file.name + ' is removed')}"
//                                ],
//                            ]) ?>
                            <?php

                            echo '<label class="control-label"><?=Yii::t?></label>';
                            echo FileInput::widget([
                                'model' => $model,
                                'attribute' => 'image',
                                'options' => ['multiple' => false , 'class' => 'class'],
                                'pluginOptions' => [
                                    'allowedFileExtensions'=>['zip','ppt','docx','pptx'],
                                    'showPreview' => true,
                                    'showCaption' => true,
                                    'showRemove' => true,
                                    'showUpload' => false,
                                    'showCancel' => false
                                ]
                            ]);

                            ?>

                        </div>
                        <div class="clearfix clear"></div>

                        <div class="col-md-6 capt">

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

                        </div>

                        <div class="form-group col-md-10">
                            <?= Html::submitButton('Yuborish', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <div class="clearfix clear"></div>

                        <?php ActiveForm::end(); ?>

                    </div>



                </div><!-- services-reception -->
                <?php
            }
            ?>
            <div class="col-md-3">
                <?= \frontend\widgets\ReceptionStats::widget()?>
            </div>
        </div>
    </section>

<?//= \frontend\widgets\MiddleBlock::widget()?>