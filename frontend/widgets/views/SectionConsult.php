<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:49
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<section class="consult">
    <div class="container">

        <div class="row">

            <?php if(!empty($_SESSION['success'])):?>
                <div class="col-lg-12 col-md-12 alert alert-success" role="alert"><?=$_SESSION['success']?></div>
            <?php endif;?>
            <?php if (!empty($_SESSION['succes']))?>
            <div class="col-md-12">
                <h3 class="text-center titler"><?=Yii::t('main','contactCompany')?></h3>
            </div>

            <div class="col-md-12">
                <div class="consult-form">
                    <h1 class="text-center">Остались вопросы или требуется консультация?</h1>
                    <?php $form = ActiveForm::begin([
                        'enableClientValidation' => true,
                        'options'=>[
                            'id' => 'contact-form'
                        ]
                    ]); ?>

                    <?= $form->field($model, 'name',[
                        'template' => "{label}{input}"
                    ])->textInput(['placeholder' => Yii::t('main','Ваше имя')])->label(false) ?>

                    <?= $form->field($model, 'phone',[
                        'template' => "{label}{input}"
                    ])->textInput(['placeholder' => Yii::t('main','Ваш телефон')])->label(false) ?>

                    <?= Html::submitButton('Оставить заявку') ?>


<!--                        <input type="text" name="name" placeholder="Ваше имя">-->
<!--                        <input type="phone" name="phone" placeholder="Ваш телефон">-->
<!--                        <button type="submit" placeholder="Ваше имя">Оставить заявку</button>-->

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</section>


<div class="index pyatno-1">
    <img src="images/pyatno-1.png" alt="pyatno" >
</div>
<div class="index pyatno-2">
    <img src="images/pyatno-2.png" alt="pyatno" >
</div>
<div class="index pyatno-3">
    <img src="images/pyatno-3.png" alt="pyatno" >
</div>
<div class="index pyatno-4">
    <img src="images/pyatno-4.png" alt="pyatno" >
</div>
<div class="index pyatno-5">
    <img src="images/pyatno-5.png" alt="pyatno" >
</div>
