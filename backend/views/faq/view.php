<?php

use common\components\StaticFunctions;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = StaticFunctions::getPartOfText( $model->question, 50 );
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'FAQ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?=Yii::t('main', 'FAQ')?>: <?= Html::encode($this->title) ?></h2>

                    <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>

                    <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                </div>
            </div>
        </div>

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'question',
                            'anons',
                            'answer:ntext',
                            'creator',
                            'created_date',
                            'order_by',
                            'status',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>

