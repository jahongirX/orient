<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?=Yii::t('main', 'Region')?>: <?= Html::encode($this->title) ?></h2>

                    <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('main', 'Do you Really wont to remove this post?'),
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
                            [
                                'attribute' => 'parent',
                                'value' => function($model)
                                {
                                    return $model->regionName->name;
                                }
                            ],
                            'name',
                            'order_by',
                            'status',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>
