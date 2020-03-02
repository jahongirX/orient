<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Admissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?=Yii::t('main', 'Admission')?>: <?= Html::encode($this->title) ?></h2>

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
                            'level_name',
                            'name',
                            'phone',
                            'fax',
                            'email:email',
                            'site',
                            'reception_days',
                            [
                                'label' => Yii::t('main', 'Image'),
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function($model){
                                    if($model->image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/s_' . $model->image ))
                                    {

                                        return '<img data-title="' . $model->title . '" data-img="' . Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->image . '" class="postImage" src="' .  Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/s_' . $model->image . '"/>';

                                    } else {

                                        return '';

                                    }
                                },
                            ],
                            'blog',
                            'biography',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

