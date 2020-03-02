<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = Yii::t('main', 'Create District');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
