<?php

use common\models\Reception;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?= Html::encode($this->title) ?></h2>

                    <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('main', 'Do you Really wont to remove this post?'),
                            'method' => 'post',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute'=>'status',
                                'format'=>'raw',
                                'value' => $model->status === Reception::STATUS_RECEIVED ? '<span class="label label-default">Received</span>' : ($model->status === Reception::STATUS_WORKING ? '<span class="label label-primary">In progress</span>' : ($model->status === Reception::STATUS_DONE ? '<span class="label label-success">Done</span>' : '<span class="label label-default">undefined</span>')),
                            ],
                            'uniqid',
                            'name:ntext',
                            'text:ntext',
                            'email:email',
                            'phone',
                            'address',
                            'index',
                            [
                                'attribute'=>'person_type',
                                'format'=>'raw',
                                'value' => $model->person_type == 0 ? 'Jismoniy' : 'Yuridik',
                            ],
                            [
                                'attribute'=>'firm_name',
                                'format'=>'raw',
                                'value' => $model->person_type == 0 ? '-' : $model->firm_name,
                            ],
                            'passport',
                            [
                                'attribute'=>'image',
                                'label' => 'Biriktirilgan fayl',
                                'format'=>'raw',
                                'value' => '<a href="'.Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'].'reception/'.$model->image.'">'.$model->image.'</a>',
                            ],
                            [
                                'attribute'=>'admissionId',
                                'label' => 'Kimga',
                                'format'=>'raw',
                                'value' => $model->admission->fullname,
                            ],
                            'time:datetime',
                            [
                                'attribute'=>'reply_text',
                                'label' => '(Javob matni)',
                                'format'=>'raw',
                                'value' => $model->reply_text ? $model->reply_text  : '<span class="label label-warning">Javob berilmagan</span>',
                            ],
                            [
                                'attribute'=>'reply_time',
                                'label' => '(Javob berilgan sana)',
                                'format'=> (int)$model->reply_time > 10000000 ? 'datetime' : 'raw',
                                'value' => (int)$model->reply_time > 10000000 ? $model->reply_time : '<span class="label label-warning">Javob berilmagan</span>',
                            ],
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>
