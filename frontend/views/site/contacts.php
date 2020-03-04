<?php

use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = \common\components\StaticFunctions::getSettings('title') . " - " . Yii::t('main', 'contacts');


?>

<section class="contacts">
    <div class="container">
        <div class="row">
            <?php if(!empty($_SESSION['success'])):?>
                <div class="col-lg-12 col-md-12 alert alert-success" role="alert"><?=$_SESSION['success']?></div>
            <?php endif;?>
            <?php if (!empty($_SESSION['succes']))?>
            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','contactCompany')?></h3>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">

                <p class="city"><span><?=Yii::t('main','town')?></span></p>

                <div class="city-item">
                    <div class="organizatsiya"><?=Yii::t('main','organization')?> </div>
                    <div class="organizatsiya-name"><?=Yii::t('main','companyFactory')?></div>
                    <div class="addre7ss">
                        <img src="/images/c-place-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('адрес')->getLang('val')?></h5>
                    </div>
                    <div class="work-time">
                        <img src="/images/c-time-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('Режим-время')->getLang('val')?></h5>
                    </div>
                    <div class="phone">
                        <img src="/images/phone-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('телефон')->getLang('val')?></h5>
                    </div>
                    <div class="email">
                        <img src="/images/email-marker.png" alt="">
                        <a href="#"><?=\common\models\Settings::findOne('эмаил')->getLang('val')?></a>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <p class="city"><span><?=Yii::t('main','town2')?></span></p>

                <div class="city-item">
                    <div class="organizatsiya"><?=Yii::t('main','organization')?></div>
                    <div class="organizatsiya-name"><?=Yii::t('main','companyFactory')?></div>
                    <div class="address">
                        <img src="/images/c-place-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('адрес')->getLang('val')?></h5>
                    </div>
                    <div class="work-time">
                        <img src="/images/c-time-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('Режим-время')->getLang('val')?></h5>
                    </div>
                    <div class="phone">
                        <img src="/images/phone-marker.png" alt="">
                        <h5><?=\common\models\Settings::findOne('телефон')->getLang('val')?></h5>
                    </div>
                    <div class="email">
                        <img src="/images/email-marker.png" alt="">
                        <a href="#"><?=\common\models\Settings::findOne('эмаил')->getLang('val')?></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>


<section class="contacts-form">

    <div class="map">
        <img src="/images/map.png" alt="map">
    </div>


    <div class="container">
        <div class="row">
            <?php $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'options'=>[
                    'id' => 'contact-form'
                ]
            ]); ?>
                <div class="col-md-7 offset-md-5 col-12">
                    <form action="">
                        <div class="form">
                            <h3><?=Yii::t('main','вопросы')?></h3>
                            <h5><?=Yii::t('main','ответим')?></h5>
                            <div class="main-input">

                                <?= $form->field($model, 'name',[
                                    'template' => "{label}{input}"
                                ])->label(Yii::t('main','name')) ?>

                                <?= $form->field($model, 'phone',[
                                    'template' => "{label}{input}"
                                ])->label(Yii::t('main','телефон')) ?>

                            </div>

                            <?= $form->field($model, 'body',[
                                'template' => "{label}{input}"
                            ])->label(Yii::t('main','body'))->textarea() ?>

    <!--                        <button type="submit" class="more btn" >--><?//=Yii::t('main','sms')?><!--</button>-->
                            <?= Html::submitButton('Оставить сообщение', ['class' => 'more btn', 'id' => 'submit-btn']) ?>
                        </div>
                    </form>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>


<div class="kontakty pyatno-1">
    <img src="/images/pyatno-1.png" alt="pyatno" >
</div>

