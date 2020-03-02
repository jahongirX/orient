<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TestimonialsLang */

$this->title = 'Create Testimonials Lang';
$this->params['breadcrumbs'][] = ['label' => 'Testimonials Langs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
