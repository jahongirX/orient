<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CallBack */

$this->title = 'Create Call Back';
$this->params['breadcrumbs'][] = ['label' => 'Call Backs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-back-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
