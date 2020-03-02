<?php

use common\models\Region;
use common\models\Settings;
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



$oferta = trim(preg_replace('/\s\s+/', ' ', Yii::t('main','oferta')));
$oferta_title = trim(preg_replace('/\s\s+/', ' ', Yii::t('main','oferta_title')));
$oferta = preg_replace('/[\r\n\t]/', '', $oferta);
$oferta_title = preg_replace('/[\r\n\t]/', '', $oferta_title);

$js = <<<JS



sweetalert_let_close = true;
$.sweetModal({
	title: "$oferta_title",
	content: "$oferta",
	buttons: [
	    {
	        label: 'OK',
	        classes: 'greenB',
	        action: function() {
	           sweetalert_let_close = false;	            	          
	        }
	    }
	],	
	onClose: function() {
	   
	    if(sweetalert_let_close){
	        window.location = '/'
	    }else{
	         $.ajax({
           url: "/services/turnoff-oferta",
           type: "get",
           data: {},
           success: function () {}
        });
	    }
	}	
});


JS;


if(Yii::$app->session->get('_oferta') == 0) {
    $this->registerJs($js,\yii\web\View::POS_READY);
}
?>



    <section class="mt-10 mb-90">
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
                        <div class="row res-bg">
                            <?$lang = \common\models\Languages::find()->where(['abb'=>Yii::$app->language])->one()->id;?>
                            <div class="col-md-3">
                                <img class="img-circle center-block" width="200px" height="200px" src="/files/admission/<?=\common\models\Admission::findOne(1)->image;?>">
                            </div>
                            <div class="col-md-9 col-sx=9">
                                <br>
                                <!--                                <p>--><?//= Yii::t ('main', 'O`zbekiston Respublikasi Qishloq va Suv xo`jaligi vaziri o`rinbosari, o\'rmon xo\'jaligi bosh boshqarmasi boshlig\'i <strong>Ergashev Sobir Fayzullaevich</strong> ning virtual qabulxonasi' ) ?><!--</p>-->
                                <p><?=\common\models\Settings::findOne('boshliq')->getLang(); ?></p>
                                <!--                                <p>--><?//= common\models\Settings::find()->where(['id'=>'boshliq'])->one()->val; ?><!--</p>-->
                                <!--                                --><?//= Yii::t('main','Если имеются заявления, жалобы или предложения в области пищевой промышленности, то у Вас есть возможность отправить их в виде обращения Руководителю Холдинга') ?>
                            </div>



                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="res-bggreen">
                                    <div class="res-sizes"><i class="fa fa-desktop"></i></div>
                                    <div class="te-text mb-1">
                                        <span><?= Yii::t('main','Через веб адрес') ?>: <b>murojaat.<?= Yii::$app->params['frontend']?></b></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="res-bggreen">
                                    <div class="res-sizes"><i class="fa fa-phone"></i></div>
                                    <div class="te-text mb-1">
                                        <span><?= Yii::t('main','По телефону') ?> <b><a href="tel:+<?= str_replace(['+',' ','(',')', '-'],'',Settings::findOne('phone1')->val) ?>" data-container="body" data-toggle="popover" data-placement="left" data-content="<?= Yii::t('main','Ishonch telefoni') ?>"><?=\common\models\Settings::findOne('phone1')->val?></a></b></span>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="row" style=" display: none;">
                            <div class="col-md-12 mb-1 te-text">
                                <?php
                                $image = Yii::getAlias('@frontend') . '/web/files/admission/'.$manager->image;
                                if(file_exists($image)){
                                    echo '<img class="img-circle" src="http://'.Yii::$app->params['frontend'].'/files/admission/'.$manager->image.'" class="img-responsive" width="100px" >';
                                } else {
                                    echo 'No Image';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 mb-4 te-text"><?= $manager->fullName ?> <?= Yii::t('main','virtual qabulxonasi') ?></div>
                            <div class="clear clearfix"></div>
                        </div>


                    </div>

                    <div class="res-bg">
                        <?php $form = ActiveForm::begin(['options'=>['class'=>'form']]); ?>
                        <div class="col-md-10">
                            <div class=""><?= $form->field($model, 'name')?></div>
                        </div>
                        <div class="col-md-5"><?= $form->field($model, 'email') ?></div>
                        <div class="col-md-5"><?= $form->field($model, 'phone') ?></div>
                        <div class="clearfix clear"></div>

                        <div class="col-md-5"><?= $form->field($model, 'person_type')->dropDownList([0 => 'Jismoniy shaxs', 1 => 'Yuridik shaxs'], [
                                'onChange' => '$("#receptionform-firm_name").prop("disabled", $(this).val() == 1 ? false : true);console.log($(this).val());'
                            ]) ?></div>
                        <div class="col-md-5"><?= $form->field($model, 'firm_name')->textInput(['disabled'=>true]) ?></div>
                        <div class="clearfix clear"></div>

                        <div class="col-md-4"><?= $form->field($model, 'passport') ?></div>
                        <div class="clearfix clear"></div>
                        <div class="col-md-10">
                            <?= $form->field($model, 'region')->widget(Select2::classname(), [
                                'id' => 'receptionform-region',
                                'data' => $regions,
                                'options' => ['placeholder' => Yii::t('main', 'Выберите')],
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
                                    'placeholder'=>Yii::t('main', 'Выберите'),
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
                                'data' => [0 => Yii::t('main', 'Заявление'), 1 => Yii::t('main', 'Жалоба'), 2 => Yii::t('main', 'Предложение')],
                                'options' => ['placeholder' => Yii::t('main', 'Выберите')],
                            ])->label(Yii::t('main','Тип обращения'));
                            ?>
                        </div>

                        <div class="col-md-12"><?= $form->field($model, 'text')->textarea() ?></div>

                        <div class="clearfix clear"></div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'image')->hiddenInput(['id' => 'reception-image-input']) ?>
                            <?= DropZone::widget([
                                'uploadUrl' => '/services/upload-file-reception',
                                'options' => ['maxFilesize' => '4', 'maxFiles' => '1', 'class'=> 'dropzone'],
                                'clientEvents' => [
                                    'success' => "function(file,r){console.log(r.name);document.getElementById('reception-image-input').value=r.name;}",
                                    'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
                                    'removedfile' => "function(file){console.log(file.name + ' is removed')}"
                                ],
                            ]) ?>
                        </div>
                        <div class="clearfix clear"></div>
                        <div class="col-md-6 capt"><?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?></div>
                        <?= Yii::t('main','Поля, помеченные * обязательны для заполнения.') ?>
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

                <?= \frontend\widgets\Sidebar::widget([
                    'RStatistic' => true,
                    'Status' => true,
                    'Weather' => true,
                    'Poll' => true,
                ])?>
            </div>
        </div>
    </section>