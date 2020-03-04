<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\StaticFunctions;

$this->title = StaticFunctions::getPartOfText( $model->name, 50 );
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Benefits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                        <h2><?=  Yii::t('main', 'Benefits') ?><?= Html::encode($this->title) ?></h2>


                    <?=  Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>

                    <?=  Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

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
            'name',
            'img',
                            ],
                        ]) ?>

                </div>

            </div>

        </div>

    </div>

</div>
