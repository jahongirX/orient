<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanySignup */

$this->title = Yii::t('main', 'Create Company Appeal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Company Signups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
        </div>

        <div class="panel-body no-padding row-default">

            <div class="row">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>

    </div>

</div>