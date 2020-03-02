<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TestimonialsLangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonials Langs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-lang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Testimonials Lang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lang',
            'parent',
            'name',
            'message:ntext',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
