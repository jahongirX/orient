<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="login-wrapper">

    <div class="bg-pic">

        <img src="/img/bg.jpg" alt="" class="lazy">

        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
        </div>

    </div>

    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 sm-p-l-15 sm-p-r-15 sm-p-t-40">

            <div class="brand">JACO</div>

            <p class="p-t-35">Войдите в свой аккаунт страницы</p>

            <?php
            $form = ActiveForm::begin(['id' => 'form-login', 'options' => ['role' => 'form', 'novalidate' => 'novalidate', 'class'=> 'p-t-15']]);
            ?>

            <?= $form->field($model, 'username', ['template' => '<div class="form-group form-group-default"><label>{labelTitle}</label><div class="controls">{input}</div></div><label id="username-error" class="error" for="username">{error}</label>{hint}'])->textInput(['autofocus' => true, 'placeholder' => 'Логин', 'class' => 'form-control', 'aria-required' => 'true', 'aria-invalid' => 'true']) ?>

            <?= $form->field($model, 'password', ['template' => '<div class="form-group form-group-default"><label>{labelTitle}</label><div class="controls">{input}</div></div><label id="password-error" class="error" for="password">{error}</label>{hint}'])->passwordInput(['autofocus' => true, 'placeholder' => 'Верительные грамоты', 'class' => 'form-control', 'aria-required' => 'true', 'aria-invalid' => 'true']) ?>

            <div class="row">
                <div class="col-md-6 no-padding">

                    <?= $form->field($model, 'rememberMe', [ 'template' => '<div class="checkbox">{input}{beginLabel}ЗАПОМНИ МЕНЯ{endLabel}</div>' ])->checkbox([], false) ?>

                </div>
            </div>

            <?= Html::submitButton('ВОЙТИ', ['class' => 'btn btn-primary btn-cons m-t-10', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>