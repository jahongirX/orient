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
use kartik\file\FileInput;

$this->title = Yii::t('main','Virtual qabulxona');
$this->params['breadcrumbs'][] = $this->title;

$regions = ArrayHelper::map(Region::getLangModels(),'id', 'name');
//
//$uploadtext = Yii::t('main','Загрузить файл');
//$this->registerJs("Dropzone.prototype.defaultOptions.dictDefaultMessage = '$uploadtext';");


$js = <<<JS

    // $('#receptionform-region').on('load change', function() {
    //     $('#receptionform-district').niceSelect('update');
    // });
    //
    // $("#receptionform-district").depdrop({
    //     depends: ['receptionform-region'],
    //     url: '/site/getcity'
    // });
    //
    // $('#reception-form').on('beforeSubmit', function(event, jqXHR, settings) 
    // {
    //     var form = $(this);
    //     if( form.find('.has-error').length ) 
    //     {
    //         return false;
    //     }
    //
    //     $.ajax({
    //         url: '/services/reception',
    //         type: 'POST',
    //         data: form.serialize(),
    //         success: function(data) 
    //         {
    //             if( data['success'] == true )
    //             {
    //                 $('#reception-success-modal').find('.uniqid').text( data['uniqid'] );
    //                 $('#reception-success-modal').iziModal('open');
    //                 form[0].reset();
    //             }
    //         }
    //     });
    //
    //     return false;
    //   
    // }).on('submit', function(e)
    // {
    //     e.preventDefault();
    // });

JS;

$this->registerJs($js);

?>

<section class="page-content virtual-reception">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-lg-9">

                <div class="row">

                    <h2 class="virtual-reception-title"><?= Yii::t('main','Подписатся на прием') ?></h2>

                    <?php $form = ActiveForm::begin([
                        'options'=>[
                            'class'=>'form',
                            'id' => 'reception-form',
                            'enctype' => 'multipart/form-data'
                        ]
                    ]); ?>

                    <div class="col-md-12 col-lg-10">

                        <?= $form->field($model, 'name',[
                            'template' => "{input}{label}"
                        ]) ?>

                        <?php if($select < 1): ?>
                        <?= $form->field($model, 'admissionId')->dropDownList($admission,[
                            'class' => 'nice-select'
                        ]) ?>
                        <?php endif;?>

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

                    <div class="col-md-6 col-lg-5">

                        <?= $form->field($model, 'passport',[
                            'template' => "{input}{label}"
                        ]) ?>

                    </div>

                    <div class="col-md-12"></div>

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

                    <div class="col-md-12 col-lg-10">

<!--                        --><?//= $form->field($model, 'image')->hiddenInput(['id' => 'reception-image-input']) ?>
<!---->
<!--                        --><?//= DropZone::widget([
//                            'uploadUrl' => '/services/upload-file-reception',
//                            'options' => [
//                                'maxFilesize' => '4',
//                                'maxFiles' => '1'
//                            ],
//                            'clientEvents' => [
//                                'success' => "function(file,r){console.log(r.name);document.getElementById('reception-image-input').value=r.name;}",
//                                'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
//                                'removedfile' => "function(file){console.log(file.name + ' is removed')}"
//                            ],
//                        ]) ?>

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

                    <div class="col-md-5">

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

                    </div>

                    <div class="col-md-12">

                        <?= Html::submitButton('Yuborish', ['class' => 'btn btn-line']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>


            <div class="col-md-4 col-lg-3">

                <?= \frontend\widgets\ReceptionStats::widget()?>

            </div>

        </div>

    </div>

</section>

<div class="iziModal" id="reception-success-modal">

    <div class="modal__inner">

        <div class="modal__close" data-izimodal-close></div>

        <div class="modal__content">

            <h3 class="title"><?=Yii::t('main','thanks')?></h3>
            <p><?=Yii::t('main','done-request')?></p>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="modal__info">

                    <?= Yii::t('main','your-id:') ?> <span class="uniqid"><?= $model->uniqid ?></span>
                    <br/>
                    <?= Yii::t('main','answer-send') ?>

                </div>

            </div>

        </div>

    </div>

</div>

