<?php

use common\components\StaticFunctions;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('main', 'contacts');


?>

<div class="inner-page-banner-area" style="background-image: url('/img/featured/back.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=Yii::t('main', 'contacts')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
            </ul>
        </div>
    </div>
</div>

<section class="contacts">

<div class="news-details-page-area">
    <div class="container">
        <div class="row">

            <div class="col-md-6">

                <h2 class="contact-page-title"><?= $this->title ?></h2>


                <div class="contact-page-info">

                    <?php if(!empty($_SESSION['success'])):?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?=Yii::t('main','success')?>
                        </div>
                    <?php endif;?>
                    <div class="address"> <i class="fa fa-map-marker"></i>  <?=Yii::t('main','Manzil')?> : <?= StaticFunctions::getSettings('address') ?></div>
                    <div class="phone"><i class="fa fa-phone"></i> <?=Yii::t('main','Telefon')?> : <?= StaticFunctions::getSettings('phone') ?></div>
                    <div class="email"><i class="fa fa-envelope-o"></i> <?=Yii::t('main','E-mail')?> : <?= StaticFunctions::getSettings('email') ?></div>


                </div>

                <div class="contact-page-form">

                    <div class="row">

                        <?php $form = ActiveForm::begin([
                            'enableClientValidation' => true,
                            'options'=>[
                                'id' => 'contact-form'
                            ]
                        ]); ?>

                            <div class="col-md-12">

                                <?= $form->field($model, 'name',[
                                    'template' => "{label}{input}"
                                ])->label(Yii::t('main','name')) ?>

                            </div>

                            <div class="col-md-12">

                                <?= $form->field($model, 'email',[
                                    'template' => "{label}{input}"
                                ])->label(Yii::t('main','email')) ?>

                            </div>

                            <div class="col-md-12">

                                <?= $form->field($model, 'phone',[
                                    'template' => "{label}{input}"
                                ])->label(Yii::t('main','phone')) ?>

                            </div>

                            <div class="col-md-12">

                                <?= $form->field($model, 'body',[
                                    'template' => "{label}{input}"
                                ])->textarea()->label(Yii::t('main','body')) ?>

                            </div>

                            <div class="col-md-12">
                                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(), [
                                    // configure additional widget properties here
                                ]) ?>
                            </div>

                            <div class="col-md-12">

                                <?= Html::submitButton(Yii::t('main','send'), ['class' => 'btn btn__yellow-2', 'id' => 'submit-btn']) ?>

                            </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                </div>

            </div>

            <div class="contacts-map col-md-6">
                <div class="row">
                    <div class="map-block col-md-12">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Acefd5aa985dbf03fbe2d62382c10a5333c5f3c4376f356965818c1c2dc49f332&amp;source=constructor" width="100%" height="500" frameborder="0"></iframe>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
</section>

