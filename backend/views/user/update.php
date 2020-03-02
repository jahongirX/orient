<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main', 'Update User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$namev = isset($userm) ? $userm->username : '';
$emailv = isset($userm) ? $userm->email : '';

?>

<?php $form = ActiveForm::begin(['id' => 'form-update']); ?>


    <div class="container-fluid container-fixed-lg m-t-20">

        <div class="panel panel-transparent">

            <div class="panel-body no-padding">
                <div class="panel panel-default">

                    <div class="panel-body page-header-block">

                        <h2><?= Html::encode($this->title) ?></h2>

                    </div>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $namev]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                    </div>

                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            </div>

        </div>

    </div>

</div>


<?php ActiveForm::end(); ?>